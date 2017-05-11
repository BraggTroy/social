<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\MailPassword;
use App\Model\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('repass');
    }

    public function resetPass(Request $request)
    {
        $pass = $request->input('pass');
        $mail = $request->input('mail');
        $user = User::findUserByEmail($mail);
        $user->password = $pass;
        $user->save();

        $ma = MailPassword::getByEmail($mail);
        $ma->state = 1;
        $ma->save();

    }
}
