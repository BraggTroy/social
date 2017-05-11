<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class SocialLog extends Model
    {
        protected $table = 'log';
        public $timestamps = false;
        public $fillable = ['userId', 'acterId', 'content', 'time', 'lianjie', 'status'];

        public static function addLog($userId, $content, $lianjie, $status = 0)
        {
            $log = new SocialLog();
            $log->userId = $userId;
            $log->acterId = session('user');
            $log->content = $content;
            $log->lianjie = $lianjie;
            $log->time = time();
            $log->status = $status;
            $log->save();
            return $log;
        }

        public static function getByUserId()
        {
            return SocialLog::where('userId', session('user'))->orderBy('id', 'desc')->paginate(1);
        }

        public function user()
        {
            return $this->hasOne('App\Model\User', 'id', 'userId');
        }

        public function actuser()
        {
            return $this->hasOne('App\Model\User', 'id', 'acterId');
        }
    }