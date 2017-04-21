<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Article;
    use App\Model\ArticleWrite_Time;
    use App\Model\CommentArticle;
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
            return view('myapp.article_detail',['article' => $article, 'user' => $user, 'gen' => $gen, 'zi' => $zi]);
        }

        public function subCom(Request $request)
        {
            $data = [];
            $data['comment'] = $request->input('content');
            $data['articleId'] = $request->input('articleId');
            $data['parent'] = $request->input('parent');
            $data['subcom'] = $request->input('subcom');
            $data['time'] = time();
            CommentArticle::store($data);
        }
    }