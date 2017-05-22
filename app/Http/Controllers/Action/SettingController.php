<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Jobs\SendEmail;
    use App\Model\Notify;
    use App\Model\User;
    use App\Model\UserSetting;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Response;

    class SettingController extends Controller
    {
        public function index()
        {
            $set = UserSetting::getSet(session('user'));
            $notify = Notify::getNotify();
            $user = User::getUserById(session('user'));

            return view('myapp.setting', ['set'=>$set, 'notify'=>$notify, 'user'=>$user]);
        }

        public function setNotify(Request $request)
        {
            $care = $this->inputGet('care_f');
            $write = $this->inputGet('write_z');
            $comment_a = $this->inputGet('comment_a');
            $comment_w = $this->inputGet('comment_w');
            $friend = $this->inputGet('friend');
            if(!Notify::changeNotify($care, $write, $comment_a, $comment_w, $friend)){
                throw new TMException('50010');
            }
        }

        public function inputGet($key, $default = 0)
        {
            if (\Request::has($key)) {
                return \Request::get($key);
            } else {
                return $default;
            }
        }

        public function setInfo(Request $request)
        {
            $name = $request->input('name');
            $email = $request->input('email');
            $zw = $request->input('zw');
            $home = $request->input('home');
            $tel = $request->input('tel');
            $sex = $request->input('sex');
            $college = $request->input('college');
            $jz = $request->input('jz');
            $company = $request->input('company');
            if(!User::setEmailName($email, $name))
            {
                throw new TMException('50014');
            }
            if(!UserSetting::setInfo($zw, $home, $tel, $sex, $college, $jz, $company))
            {
                throw new TMException('50015');
            }
        }

        public function setPasswd(Request $request)
        {
            $old = $request->input('oldpass');
            $new = $request->input('newpss');
            if(!User::setPasswd($old, $new)){
                throw new TMException('50017');
            }
        }

        public function jihuo($id)
        {
            $user = User::find($id);
            $user->state = 1;
            $user->save();
            return Response::view('errors.503', ['message' => '账号已激活'], 200);
        }

        public function send(Request $request)
        {
            $id = $request->input('id');
            $user = User::find($id);
            $d = [];
            $d['mail'] = $user['email'];
            $d['title'] = '点击激活';
            $d['body'] = 'http://social.cn/jihuo/'.$user['id'];
            $this->dispatch(new SendEmail($d));
        }
    }