<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class UserImage extends Model
    {
        protected $table = 'user-image';

        public $timestamps = false;

        public $fillable = ['userId', 'name'];

        public static function registerUser($user_id)
        {
            $image = new UserImage();
            $image->name = 'user';
            $image->userId = $user_id;
            return $image->save();
        }
    }