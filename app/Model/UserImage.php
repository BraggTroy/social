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
            $data = [];
            $data['name'] = 'user';
            $data['userId'] = $user_id;
            return UserImage::create($data);
        }
    }