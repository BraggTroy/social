<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // 定义表名
    protected $table = 'user';

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password'];


    public function getPasswordByEmail($email) {

    }

    public static function addUser(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->name = explode('@', $request->input('email'))[0];
        $user->save();
        return $user;
    }

    public static function findUserByEmail($email)
    {
        $where = [
            'email' => $email
        ];
        return User::where($where)->first();
    }

    public function image()
    {
        return $this->hasOne('App\Model\UserImage', 'userId', 'id');
    }

    public static function getUserById($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    public function set()
    {
        return $this->hasOne('App\Model\UserSetting','userId', 'id');
    }
}
