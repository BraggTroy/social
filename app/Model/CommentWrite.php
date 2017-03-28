<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class CommentWrite extends Model
    {
        protected $table = 'comment_write';
        public $timestamps = false;

        public $fillable = ['writedId', 'comment', 'time', 'userId', 'parent'];

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }
    }