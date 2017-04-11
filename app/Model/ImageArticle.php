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

        public static function saveImage($articleId, $array)
        {
            $input = [];
            $input['name'] = $array['name'];
            $input['time'] = time();
            $input['articleId'] = $articleId;
            return ImageArticle::create($input);
        }

        public static function getImgByWriteId($articleId)
        {
            $where = ['articleId' => $articleId];
            return ImageWrite::where($where)->get();
        }
    }