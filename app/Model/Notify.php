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
            $notify->article_z = 0;
            $notify->write_z = 0;
            $notify->comment_a = 0;
            $notify->comment_w = 0;
            $notify->friend = 0;
            $notify->userId = $id;
            $notify->save();
        }

        public static function changeNotify($article, $write, $comment_a, $comment_w, $friend)
        {
            $notify = Notify::where('userId', session('user'))->first();
            $notify->article_z = $article;
            $notify->write_z = $write;
            $notify->comment_a = $comment_a;
            $notify->comment_w = $comment_w;
            $notify->friend = $friend;
            return $notify->save();
        }

        public static function getNotify()
        {
            return Notify::where('userId', session('user'))->first();
        }
    }