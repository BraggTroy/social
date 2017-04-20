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
            $set->sex = 2;
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

        public static function setInfo($zw, $home, $tel, $sex, $college, $jz, $company)
        {
            $set = UserSetting::where('userId', session('user'))->first();
            if ($set['zw'] != $zw){
                $set->zw = $zw;
            }
            if ($set['home'] != $home){
                $set->home = $home;
            }
            if ($set['tel'] != $tel){
                $set->tel = $tel;
            }
            if ($set['sex'] != $sex){
                $set->sex = $sex;
            }
            if ($set['college'] != $college){
                $set->college = $college;
            }
            if ($set['jz'] != $jz){
                $set->jz = $jz;
            }
            if ($set['company'] != $company){
                $set->company = $company;
            }
            return $set->save();
        }
    }