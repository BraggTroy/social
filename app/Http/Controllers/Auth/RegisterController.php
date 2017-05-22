<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Exception\TMException;
use App\Jobs\SendEmail;
use App\Model\Album;
use App\Model\FriendGroup;
use App\Model\Notify;
use App\Model\User;
use App\Model\UserImage;
use App\Model\UserSetting;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function registerUser(Request $request)
    {
        $u = User::findUserByEmail($request->input('email'));
        if ($u) {
            throw new TMException('50011');
        }else {
            $user = User::addUser($request);
            UserImage::registerUser($user['id']);
            Notify::addNotify($user['id']);
            FriendGroup::addGroup($user['id']);
            Album::createAlbum($user['id']);
            UserSetting::addSet($user['id']);

            $d = [];
            $d['mail'] = $user['email'];
            $d['title'] = '点击激活';
            $d['body'] = 'http://social.cn/jihuo/'.$user['id'];
            $this->dispatch(new SendEmail($d));
        }

    }
}
