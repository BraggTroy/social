<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class CommentArticle extends Model
    {
        protected $table = 'comment_article';
        public $timestamps = false;

        public $fillable = ['ArticleId', 'comment', 'time', 'userId', 'parent'];

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }
    }