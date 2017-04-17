<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class CommentArticle extends Model
    {
        protected $table = 'comment_article';
        public $timestamps = false;

        public $fillable = ['articleId', 'comment', 'time', 'userId', 'parent', 'subcom'];

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }

        public function sub()
        {
            return $this->belongsTo('App\Model\CommentArticle', 'subcom', 'id');
        }

        public static function store($arr)
        {
            $com = new CommentArticle();
            $com->articleId = $arr['articleId'];
            $com->comment = $arr['comment'];
            $com->time = $arr['time'];
            $com->userId = session('user');
            $com->parent = $arr['parent'];
            $com->subcom = $arr['subcom'];
            $com->save();
        }
    }