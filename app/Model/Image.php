<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class Image extends Model
    {
        // 定义表名
        protected $table = 'image';
        public $timestamps = false;
        public $fillable = ['name', 'userId', 'xc', 'time', 'oriname'];


        public static function getImagesByAlbumId($albumId)
        {
            return Image::where('xc', $albumId)->orderBy('time', 'desc')->get();
        }

        public static function getImagesByUser($userId)
        {
            return Image::where('userId', $userId)->orderBy('time', 'desc')->get();
        }

        public static function store($name, $userId, $xc, $time, $oriname)
        {
            $image = new Image();
            $image->name = $name;
            $image->userId = $userId;
            $image->xc = $xc;
            $image->time = $time;
            $image->oriname = $oriname;
            $image->save();
        }

        public static function deleteImage($name)
        {
            Image::where('name', $name)->delete();
        }


    }