<?php
    namespace App\Model;

    class Write
    {
        // 定义表名
        protected $table = 'write';

        public $timestamps = false;

        // 白名单字段
        protected $fillable = [];
    }