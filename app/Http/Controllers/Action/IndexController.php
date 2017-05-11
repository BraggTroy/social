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

                SocialLog::addLog($write->user['id'], '评论了你的说说', '');

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
            if ($zan = WriteZan::getZanByUser($writeId)) {
                if ($zan['state'] == 0) {
                    $zan->state = 1;
                    $zan->save();
                    echo 0;
                }else {
                    $zan->state = 0;
                    $zan->save();
                    echo 1;
                }
            }else {
                WriteZan::add($writeId, time());
                echo 1;
            }
        }

        public function sf($writeId)
        {
            $write = Write::getWriteById($writeId);
            $user = User::getUserById(session('user'));
            $image = '';
            foreach ($write->image as $img) {
                if ($img['name'])
                $image .= "<img src='/image/upload/" . $img['name'] ."' width='225' height='226'>";
            }
            return '<html style="background-color: #eeeeee"><link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/css/font-awesome.min.css"><link rel="stylesheet" href="/css/index.css"><div class="article" >
                         <div class="article-head">
                              <a href=""><img src="/image/upload/'.$write->user->image['name'].'"></a>
                                <div class="article-head-name">
                                    <li>'.$write->user['name'].'</li>
                                    <li>'.date('Y-m-d H:i:s', $write['time']).'</li>
                                </div>
                            </div>
                            <div class="article-content">
                        <span>'.$write['content'].'</span>
                                <div class="article-content-image">
                                        '.$image.'
                                </div>
                            </div>

                            <div class="article-footer">
                                <div class="article-action">
                                    <ul>
                                        <li><span><i class="icon-comment-alt"></i>&nbsp;评论</span></li>

                                        @if($v[\'iszandq\'] == 1)
                                            <li><span id="tttz{{$v[\'id\']}}" onclick="dianzan('.$write['id'].','.session('user').', '.$user->image['name'].')"><i style="color:red" class="glyphicon glyphicon-thumbs-up"></i>&nbsp;取消赞</span></li>
                                        @else
                                            <li><span id="tttz{{$v[\'id\']}}" onclick="dianzan(\'{{$v[\'id\']}}\',\'{{session(\'user\')}}\', \'{{$user->image[\'name\']}}\')"><i class="glyphicon glyphicon-thumbs-up"></i> 赞</span></li>
                                        @endif


                                        <li><span><i class="icon-share"></i>&nbsp;转发</span></li>
                                    </ul>
                                </div>
                                <div class="article-zan-icon imagezan{{$v[\'id\']}}">
                                    <a class="zan-icon"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                    @foreach($v->wzan as $zan)
                                        @if($zan[\'state\'] == 0)
                                            <a id="imgzan{{$zan->user[\'id\']}}" href="/home/show/{{$zan->user[\'id\']}}">
                                                <img src="{{ URL::asset(\'/image/upload/\'.$zan->user->image[\'name\']) }}">
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="comment comment{{$v[\'id\']}}">
                                    @foreach($v->comment as $comment)
                                        @if($comment[\'parent\'] == 0)
                                            <div class="comment-item">
                                                <a href=""><img src="{{ URL::asset(\'/image/upload/\' . $comment->user->image[\'name\']) }}"></a>
                                                <div class="comment-content">
                                                    <ul>
                                                        <li>{{ $comment->user[\'name\'] }} &nbsp;{{ date(\'Y-m-d H:i\', $comment[\'time\']) }}<span class="res res{{$comment[\'id\']}}" onclick="reComment(\'{{$v[\'id\']}}\',\'{{$comment[\'id\']}}\',\'{{$me[\'name\']}}\', \'{{$me->image[\'name\']}}\')">回复</span></li>
                                                        <li>{{ $comment[\'comment\'] }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="comment-item">
                                                <a href=""><img src="{{ URL::asset(\'/image/upload/\' . $comment->user->image[\'name\']) }}"></a>
                                                <div class="comment-content">
                                                    <ul>
                                                        <li>{{ $comment->user[\'name\'] }} 回复 {{ $comment->recom->user[\'name\'] }}&nbsp;{{ date(\'Y-m-d H:i\', $comment[\'time\']) }}<span class="res res{{$comment[\'id\']}}" onclick="reComment(\'{{$v[\'id\']}}\',\'{{$comment[\'id\']}}\',\'{{$me[\'name\']}}\', \'{{$me->image[\'name\']}}\')">回复</span></li>
                                                        <li>{{ $comment[\'comment\'] }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="comment-input comment-input{{$v[\'id\']}}" onblur="cancelComment(this)">
                                    <img src="{{ URL::asset(\'/image/upload/\' . $me->image[\'name\']) }}">
                                    <span type="text" class="input-show input-show{{$v[\'id\']}}" onclick="showComment(this)">写下你的评论 ...</span>
                                    <div class="comment-input-detial comment-input-detial{{$v[\'id\']}}" style="display: none">
                                        <textarea class="write write{{$v[\'id\']}}" ></textarea>
                                        <div class="f-bottom">
                                            <span href=""><i class=""></i></span>
                                            <span class="cancle-write" onclick="cancelWrite({{ $v[\'id\'] }})">取消</span>
                                            <a href="javascript:submitComment(\'{{ $v[\'id\'] }}\', \'{{$me[\'name\']}}\', \'{{$me->image[\'name\']}}\')" class="submit" ><i class="glyphicon glyphicon-send"></i>&nbsp;发布</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="/js/jquery/jquery.min.js"></script>
                        <script src="/bootstrap/js/bootstrap.min.js"></script>
                        <script src="/layui/layui.js"></script><script src="/js/index.js"></script>
            </html>';
        }
    }