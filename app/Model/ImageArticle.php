<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class ImageArticle extends Model
    {
        protected $table = "image-article";
        public $timestamps = false;

        // 白名单字段
        protected $fillable = ['articleId', 'time', 'name'];

        public static function saveImage($articleId, $array, $hasImg=1)
        {
            if ($hasImg) {
                $arr = explode('/', $array['image']);
                array_pop($arr);
                $data = [];
                foreach ($arr as $k => $v) {
                    $data[$k]['articleId'] = $articleId;
                    $data[$k]['name'] = $v;
                    $data[$k]['time'] = time();
                }
                DB::table('image-write')->insert($data);
            }
        }

        public static function getImgByWriteId($writeId)
        {
            $where = ['articleId' => $writeId];
            return ImageWrite::where($where)->get();
        }
    }