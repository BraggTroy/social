<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class Image extends Model
    {
        // 定义表名
        protected $table = 'user';

        public $timestamps = false;

        public static function saveImage($writeId, $array)
        {
            $arr = explode('/', $array['image']);
            array_pop($arr);
            $data = [];
            foreach ($arr as $k => $v) {
                $data[$k]['userId'] = session('user');
                $data[$k]['writeId'] = $writeId;
                $data[$k]['name'] = $v;
                $data[$k]['xc'] = 1;
            }
            DB::table('image')->insert($data);
        }
    }