<?php
    namespace App\Http\Controllers\Action;

    use App\Events\ArticleReadEvent;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Jobs\SendEmail;
    use App\Model\Article;
    use App\Model\ArticleWrite_Time;
    use App\Model\ArticleZF;
    use App\Model\CommentArticle;
    use App\Model\SocialLog;
    use App\Model\User;
    use Illuminate\Http\Request;

    class ArticleController extends Controller
    {
        public function submitArticle(Request $request)
        {
            $data = [];
            $data['title'] = $request->input('title');
            $data['content'] = $request->input('content');
            $data['yc'] = $request->input('yc');
            $data['canpl'] = $request->input('pl');
            $data['see'] = $request->input('see');
            $data['time'] = time();
            $data['wz'] = $request->input('wz');
            if (!$art = Article::saveArticle($data)){
                throw new TMException('5003');
            }else {
                ArticleWrite_Time::saveAWT($art['id'], 0, $art['time'], $art['see']);
            }
        }

        public function showArticle($id)
        {
            \Event::fire(new ArticleReadEvent($id));
            $article = Article::getArticleById($id);
            $comment = $article->comment()->get();
//            $comment = $query->where('parent', 0)->orderBy('time', 'desc')->get();
            $gen = [];
            $zi = [];
            foreach ($comment as $v) {
                if ($v['parent'] == 0) {
                    $gen[] = $v;
                }else if($v['parent'] != 0){
                    $zi[$v['parent']][] = $v;
                }
            }
            $user = User::getUserById(session('user'));
            $azf = ArticleZF::getByUserId($id);
//            dd($zi);
            return view('myapp.article_detail',['article' => $article, 'user' => $user, 'gen' => $gen, 'zi' => $zi, 'azf'=>$azf]);
        }

        public function subCom(Request $request)
        {
            $data = [];
            $data['comment'] = $request->input('content');
            $data['articleId'] = $request->input('articleId');
            $data['parent'] = $request->input('parent');
            $data['subcom'] = $request->input('commentId');
            $data['time'] = time();
            $com = CommentArticle::store($data);

            
            if ($data['parent']) {
                $user = User::getUserById(session('user'));
                $d = [];
                $d['mail'] = CommentArticle::find($data['parent'])->user['email'];
                $d['title'] = '有人回复了你的评论';
                $d['body'] = $user['name'] . ' 回复了你的评论，快去看看吧';
                $this->dispatch(new SendEmail($d));
            }

            $article = Article::getArticleById($data['articleId']);
            if ($article->user->notify['comment_a'] == 1) {
                $user = User::getUserById(session('user'));
                $d = [];
                $d['mail'] = $article->user['email'];
                $d['title'] = '你发布的文章有新评论了';
                $d['body'] = $user['name'] . ' 评论了你的文章，快去看看吧。http://social.cn/show/'.$data['articleId'];
                $this->dispatch(new SendEmail($d));
            }
            SocialLog::addLog($article->user['id'], '评论了你的文章', '/show/'.$data['articleId']);

            return json_encode(['time'=>date('Y-m-d H:i:s', $com['time']), 'id'=>$com['id']]);
        }

        public function zan(Request $request)
        {
            $articleId = $request->input('articleId');
            $article = Article::getArticleById($articleId);
            $azf = ArticleZF::getByUserId($articleId);
            if ($azf) {
                if ($azf['z'] == 1) {
                    return 0;
                }else {
                    $azf->z = 1;
                    $azf->f = 0;
                    $azf->save();
                    $art = Article::getArticleById($articleId);
                    $art->fandui = $art['fandui'] - 1;
                    $art->zan = $art['zan'] + 1;
                    $art->save();
                    SocialLog::addLog($article->user['id'], '点赞了你的文章', '/show/'.$articleId);
                    return 2;
                }
            }else {
                ArticleZF::addOne(1, 0, $articleId);
                $art = Article::getArticleById($articleId);
                $art->zan = $art['zan'] + 1;
                $art->save();
                SocialLog::addLog($article->user['id'], '点赞了你的文章', '/show/'.$articleId);
                return 1;
            }
        }

        public function fandui(Request $request)
        {
            $articleId = $request->input('articleId');
            $article = Article::getArticleById($articleId);
            $azf = ArticleZF::getByUserId($articleId);
            if ($azf) {
                if ($azf['f'] == 1) {
                    return 0;
                }else {
                    $azf->f = 1;
                    $azf->z = 0;
                    $azf->save();
                    $art = Article::getArticleById($articleId);
                    $art->fandui = $art['fandui'] + 1;
                    $art->zan = $art['zan'] - 1;
                    $art->save();
                    SocialLog::addLog($article->user['id'], '反对了你的文章', '/show/'.$articleId);
                    return 2;
                }
            }else {
                ArticleZF::addOne(0, 1, $articleId);
                $art = Article::getArticleById($articleId);
                $art->fandui = $art['fandui'] + 1;
                $art->save();
                SocialLog::addLog($article->user['id'], '反对了你的文章', '/show/'.$articleId);
                return 1;
            }
        }
    }