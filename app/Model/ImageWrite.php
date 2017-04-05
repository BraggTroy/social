<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class ImageWrite extends Model
    {
        protected $table = "image-write";
        public $timestamps = false;
        // 白名单字段
        protected $fillable = ['writeId', 'time', 'name'];

        public static function saveImage($writeId, $array, $hasImg=1)
        {
            if ($hasImg) {
                $arr = explode('/', $array['image']);
                count($arr) > 1 ? array_pop($arr) : false;
                $data = [];
                foreach ($arr as $k => $v) {
                    $data[$k]['writeId'] = $writeId;
                    $data[$k]['name'] = $v;
                    $data[$k]['time'] = time();
                }
                DB::table('image-write')->insert($data);
            }
        }

        public static function getImgByWriteId($writeId)
        {
            $where = ['writeId' => $writeId];
            return ImageWrite::where($where)->get();
        }
    }