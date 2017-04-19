<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Notify extends Model
    {
        protected $table = 'notify';
        public $timestamps = false;
        public $fillable = ['article', 'write', 'comment_a', 'comment_w', 'friend'];

        public static function addNotify($id)
        {
            $notify = new Notify();
            $notify->article = 0;
            $notify->write = 0;
            $notify->comment_a = 0;
            $notify->comment_w = 0;
            $notify->friend = 0;
            $notify->userId = $id;
            $notify->save();
        }

        public static function changeNotify($article, $write, $comment_a, $comment_w, $friend)
        {
            $notify = Notify::where('userId', session('user'))->first();
            $notify->article = $article;
            $notify->write = $write;
            $notify->comment_a = $comment_a;
            $notify->comment_w = $comment_w;
            $notify->friend = $friend;
            $notify->save();
        }
    }