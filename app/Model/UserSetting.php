<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class UserSetting extends Model
    {
        protected $table = 'user-setting';
        public $timestamps = false;

        public static function getUserSettingById($id)
        {
            return UserSetting::find($id);
        }

    }