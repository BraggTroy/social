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

        public static function addSet($userId)
        {
            $set = new UserSetting();
            $set->userId = $userId;
            $set->save();
        }

        public static function getSet($user_id)
        {
            return UserSetting::where('userId', $user_id)->first();
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }

        public static function getSetByCollege($college)
        {
            return UserSetting::where('college', $college)->limit(3)->get();
        }
    }