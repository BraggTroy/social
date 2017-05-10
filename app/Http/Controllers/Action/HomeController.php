<?php
    namespace App\Http\Controllers\Action;

    use App\Events\VisitEvent;
    use App\Http\Controllers\Controller;
    use App\Model\Article;
    use App\Model\Friend;
    use App\Model\User;
    use App\Model\Write;
    use Event;

    class HomeController extends Controller
    {
        public function show($userId)
        {
            Event::fire(new VisitEvent($userId));
            $article = Article::getHomeArticle($userId);
            $write = Write::getHomeWrite($userId);
            $user = User::getUserById($userId);

            $isFriend = false;
            if ($userId != session('user')) {
                $arr = [];
                $friend = Friend::getFriendsByUserId($userId);
                foreach ($friend as $f) {
                    $arr[] = $f['friendId'];
                }
                if (in_array($userId, $arr)) {
                    $isFriend = true;
                }
            }
            return view('myapp.home', ['article'=>$article, 'write'=>$write, 'user'=>$user, 'isFriend'=>$isFriend]);
        }
    }