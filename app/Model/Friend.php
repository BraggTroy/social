<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Friend extends Model
    {
        // 定义表名
        protected $table = 'friend';

        public $timestamps = false;

        // 白名单字段
        protected $fillable = [];

        public static function getFriendsByUserId($user_id)
        {
            $where = ['userFromId' => $user_id];
            return Friend::where($where)->get();
        }
    }