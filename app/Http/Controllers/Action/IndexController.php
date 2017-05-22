<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Jobs\SendEmail;
    use App\Model\Article;
    use App\Model\ArticleWrite_Time;
    use App\Model\CommentWrite;
    use App\Model\Friend;
    use App\Model\ImageWrite;
    use App\Model\SocialLog;
    use App\Model\User;
    use App\Model\UserSetting;
    use App\Model\Write;
    use App\Model\WriteZan;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use League\Flysystem\Exception;

    class IndexController extends Controller
    {
        /**
         * @param int $offset 偏移量
         * @param int $size 查询条数
         * @return View
         */
        public function index($offset = 0, $size = 10)
        {
            $a_w = new ArticleWrite_Time();
            $message = $a_w->getMessageByUserId(session('user'), $offset, $size);

            $articleId = [];
            $writeId = [];
            foreach ($message as $v) {
                if ($v['articleId'] == 0) {
                    $writeId[] = $v['writeId'];
                }else {
                    $articleId[] = $v['articleId'];
                }
            }

            $writes = Write::getWritesByIds($writeId);
            $articles = Article::getArticlesByIds($articleId);

            foreach ($writes as &$v) {
                foreach ($v['wzan'] as $z) {
                    if ($z['state'] == 0 && $z['userId'] == session('user')) {
                        $v['iszandq'] = 1;
                        break;
                    }
                }
                $v['iszandq'] = isset($v['iszandq']) ? 1 : 0;
            }

            $total = [];
            foreach ($writes as &$v) {
                $total[] = $v;
            }
            foreach ($articles as $v) {
                $total[] = $v;
            }
            //自定义排序
            usort($total, array('App\Http\Controllers\Action\IndexController', 'sortByTime'));
//return $total;
            $user = User::getUserById(session('user'));

            $tj = User::choiceRand();
            return view('myapp.index', ['data' => $total, 'me' => $user, 'user'=>$user, 'tj'=>$tj]);
        }

        public function submitWrite(Request $request)
        {
            $hasImg = is_null($request->input('image')) ? 0 : 1;
            $write = Write::saveWrite($request->except('image'), $hasImg);
            if ($write) {
                ImageWrite::saveImage($write['id'], $request->only('image'), $hasImg);
                ArticleWrite_Time::saveAWT(0, $write['id'], $write['time'], $write['see']);
                return json_encode(['code'=>'200']);
            }else {
                throw new TMException('4042');
            }
        }

        // 自定义排序
        protected function sortByTime($a, $b)
        {
            if ($a['time'] > $b['time']) {
                return -1;
            }elseif($a['time'] == $b['time']) {
                return $a['id'] > $b['id'] ? -1 : 1;
            }else {
                return 1;
            }
        }

        public function submitWriteComment(Request $request)
        {
            $id = $request->input('id');
            $content = $request->input('content');
            $parent = $request->input('parent');
            $time = time();
            $comment = CommentWrite::saveComment($id, $content, $time, $parent);
            if ($comment) {
                if ($parent) {
                    $user = User::getUserById(session('user'));
                    $data = [];
                    $data['mail'] = CommentWrite::find($parent)->user['email'];
                    $data['title'] = '有人回复了你的评论';
                    $data['body'] = $user['name'] . ' 回复了你的评论，快去看看吧';
                    $this->dispatch(new SendEmail($data));
                }
                // 发送邮件
                $write = Write::getWriteById($id);
                if ($write->user->notify['comment_w'] == 1) {
                    $user = User::getUserById(session('user'));
                    $data = [];
                    $data['mail'] = $write->user['email'];
                    $data['title'] = '你发布的说说有新评论了';
                    $data['body'] = $user['name'] . ' 评论了你的说说，快去看看吧';
                    $this->dispatch(new SendEmail($data));
                }

                SocialLog::addLog($write->user['id'], '评论了你的说说', '/write/sf/'.$id);

                return json_encode(['code'=>'200', 'time'=>date('Y-m-d H:i', $time), 'id'=>$comment['id'], 'reuser'=>isset($comment->recom->user['name']) ? $comment->recom->user['name'] : 0]);
            }else {
                throw new TMException('5002');
            }
        }

        public function friendRecommend()
        {
            $set = UserSetting::getSet(session('user'));
            $user = [];
            if ($set['college']) {
                $this->addSetUser($user, 'college', $set);
            }
            if ($set['company']) {
                $this->addSetUser($user, 'company', $set);
            }
            if ($set['home']) {
                $this->addSetUser($user, 'home', $set);
            }
            if ($set['jz']) {
                $this->addSetUser($user, 'jz', $set);
            }
        }

        public function addSetUser(&$user, $key, $set)
        {
            if ($set[$key]) {
                $college = UserSetting::getSetByCollege($set['$key']);
                foreach ($college as $v) {
                    $user[] = $v->user;
                }
            }
        }

        public function zan(Request $request)
        {
            $writeId = $request->input('writeId');
            $write = Write::getWriteById($writeId);
            if ($zan = WriteZan::getZanByUser($writeId)) {
                if ($zan['state'] == 0) {
                    $zan->state = 1;
                    $zan->save();
                    SocialLog::addLog($write->user['id'], '取消了点赞', '/write/sf/'.$writeId);
                    echo 0;
                }else {
                    $zan->state = 0;
                    $zan->save();
                    SocialLog::addLog($write->user['id'], '点赞了你的说说', '/write/sf/'.$writeId);
                    echo 1;
                }
            }else {
                WriteZan::add($writeId, time());
                SocialLog::addLog($write->user['id'], '点赞了你的说说', '/write/sf/'.$writeId);
                echo 1;
            }
        }

        public function sf($writeId)
        {
            $write = Write::getWriteById($writeId);
            $user = User::getUserById(session('user'));
            return view('myapp.sf', ['v' => $write, 'me' => $user, 'user'=>$user]);
        }
    }