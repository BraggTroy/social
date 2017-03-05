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

    public static function addUser(Request $request) {
        $input['email'] = $request->input('email');
        $input['password'] = $request->input('password');
        $input['name'] = explode('@', $input['email'])[0]
                    . implode('', explode('.', explode('@', $input['email'])[1]));
        User::create($input);
    }

    public static function findUserByEmail($email)
    {
        $where = [
            'email' => $email
        ];
        User::where($where)->get();
    }
}
