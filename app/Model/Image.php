<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class Image extends Model
    {
        // 定义表名
        protected $table = 'image';

        public $timestamps = false;


    }