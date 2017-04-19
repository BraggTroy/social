<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Album extends Model
    {
        protected $table = 'album';
        public $timestamps = false;
        public $fillable = ['userId', 'name'];

        public static function getAlbumByUser($userId)
        {
            return Album::where('userId', $userId)->get();
        }

        public static function addAlbum($name){
            $album = new Album();
            $album->name = $name;
            $album->userId = session('user');
            $album->save();
            return $album;
        }

        public static function createAlbum($userId)
        {
            $album = new Album();
            $album->name = '我的相册';
            $album->userId = $userId;
            $album->save();
            return $album;
        }

        public static function delAlbum($id)
        {
            return Album::where('id', $id)->delete();
        }
    }