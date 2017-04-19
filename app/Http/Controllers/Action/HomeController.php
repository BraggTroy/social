<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Model\Article;
    use App\Model\User;
    use App\Model\Write;

    class HomeController extends Controller
    {
        public function show($userId)
        {
            $article = Article::getHomeArticle($userId);
            $write = Write::getHomeWrite($userId);
            $user = User::getUserById($userId);

            return view('myapp.home', ['article'=>$article, 'write'=>$write, 'user'=>$user]);
        }
    }