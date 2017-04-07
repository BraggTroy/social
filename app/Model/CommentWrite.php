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

        public static function saveComment($id, $content, $time, $parent = 0)
        {
            $data = new CommentWrite();
            $data->userId = session('user');
            $data->comment = $content;
            $data->parent = $parent;
            $data->time = $time;
            $data->writeId = $id;
            $data->save();
            return $data['id'];
        }
    }