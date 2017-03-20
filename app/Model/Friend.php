<?php
    namespace App\Model;

    class Friend
    {
        // 定义表名
        protected $table = 'friend';

        public $timestamps = false;

        // 白名单字段
        protected $fillable = [];

        public function getFriendsByUserId($user_id)
        {
            $where = ['userId' => $user_id];
            return Friend::where($where)->get();
        }
    }