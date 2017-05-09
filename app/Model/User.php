<?php

namespace App\Model;

use App\Http\Controllers\Exception\TMException;
use DB;
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
        $user->state = 0;
        $user->online = 'offline';
        $user->name = explode('@', $request->input('email'))[0];
        $user->save();
        return $user;
    }

    public static function findUserByEmail($email)
    {
        $where = [
            'email' => $email
        ];
        return User::where('email', $email)->first();
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

    public static function setEmailName($email, $name)
    {
        $user = User::find(session('user'));
        if ($email != $user['email']) {
            $user->email = $email;
            //TODO 发送邮件,确认邮箱
            $user->state = 0;
        }
        if ($name != $user['name']) {
            $user->name = $name;
        }
        return $user->save();
    }

    public static function setPasswd($oldpass, $newpasswd)
    {
        $user = User::find(session('user'));
        if ($user['password'] == $oldpass) {
            $user->password = $newpasswd;
            return $user->save();
        }
        throw new TMException('50016');
    }

    public static function choiceRand()
    {
        $sql = 'SELECT * FROM User B JOIN (SELECT CEIL(MAX(ID)*RAND()) AS ID FROM User) AS m ON B.ID >= m.ID LIMIT 6';
        $res =  DB::select($sql);
        foreach ($res as &$v) {
            $v = json_decode(json_encode($v), True);
            $v['image'] = UserImage::findById($v['id'])['name'];
        }
        return $res;
    }
}
