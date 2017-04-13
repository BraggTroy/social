<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Article;
    use App\Model\ArticleWrite_Time;
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
            $user = User::getUserById(session('user'));
            return view('myapp.article_detail',['article' => $article, 'user' => $user]);
        }


    }