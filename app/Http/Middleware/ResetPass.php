<?php
namespace App\Http\Middleware;

use App\Http\Controllers\Exception\TMException;
use App\Model\MailPassword;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Input;

class ResetPass
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $sign = rawurldecode($request->input("sign"));
        if (!$sign) {
            throw new TMException("4043");
        }
        $data = [];
        $data['mail'] = $request->input('mail');
        $data['time'] = $request->input('time');
        $data['expire'] = $request->input('expire');
        ksort($data);
        $string_for_sign = implode("\n", $data);
        $signature = base64_encode(hash_hmac('sha1', $string_for_sign, config('app.private_key'), true));
        if ($signature != $sign ) {
            throw new TMException("4043");
        } else {
            if ($data['expire'] < time()) {
                throw new TMException("4043");
            }
            $ma = MailPassword::getByEmail($data['mail']);
            if (!$ma || $ma['time'] != $data['time']) {
                throw new TMException("4043");
            }
            $response = $next($request);
            return $response;
        }
    }
}