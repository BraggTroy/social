<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Notify;
    use Illuminate\Http\Request;

    class SettingController extends Controller
    {
        public function index()
        {

        }

        public function changeNotify(Request $request)
        {
            $article = $this->inputGet('article');
            $write = $this->inputGet('write');
            $comment_a = $this->inputGet('comment_a');
            $comment_w = $this->inputGet('comment_w');
            $friend = $this->inputGet('friend');
            if(!Notify::changeNotify($article, $write, $comment_a, $comment_w, $friend)){
                throw new TMException('50010');
            }
        }

        public function inputGet($key, $default = 0)
        {
            if (\Request::has($key)) {
                return \Request::get($key);
            } else {
                return $default;
            }
        }
    }