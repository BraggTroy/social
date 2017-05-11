<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception\TMException;
use App\Jobs\SendEmail;
use App\Model\MailPassword;
use App\Model\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendMail(Request $request)
    {
        $mail = $request->input('email');
        if (!User::findUserByEmail($mail)) {
            throw new TMException('50018');
        }
        $data = [];
        $data['mail'] = $mail;
        $data['time'] = time();
        $data['expire'] = $data['time'] + 7200;

        //生成签名
        ksort($data);
        $string_for_sign = implode("\n", $data);
        $signature=rawurlencode(base64_encode(hash_hmac('sha1', $string_for_sign, config('app.private_key'), true)));

        $data['body'] = "请打开一下连接进行密码重置，该链接有效时间2小时。http://social.cn/passwd/reset?mail=".$mail."&time=".$data['time']."&expire=".$data['expire']."&sign=".$signature;
        $data['title'] = "修改密码";

        // 加入邮件发送队列
        dispatch(new SendEmail($data));
        //  添加数据库
        MailPassword::storeMailPassword($data['mail'], 0, $data['time']);
    }
}
