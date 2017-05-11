<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Model\FriendGroup;
    use App\Model\FriendRequest;
    use App\Model\User;
    use Illuminate\Http\Request;

    class ChatController extends Controller
    {
        public function getFriendList()
        {
            $group = FriendGroup::getGroupByUserId(session('user'));
            $user = User::getUserById(session('user'));
            $arr = [];

            foreach ($group as $g) {
                $data = [];
                foreach ($g->friend as $f) {
                    $data[] = ['username'=>$f->user['name'], 'id'=>$f->user['id'], 'status'=>$f->user['online'], 'sign'=>$f->user['sign'], 'avatar'=>'/image/upload/'.$f->user->image['name']];
                }
                $arr['data']['friend'][] = ['groupname'=>$g['name'], 'id'=>$g['id'], 'list'=>$data];
            }

            if (count($arr) == 0) {
                return json_encode(['code'=>1, 'msg'=>'暂无好友']);
            }
            $arr['code'] = 0;
            $arr['data']['mine'] = ['username'=>$user['name'], 'id'=>$user['id'], 'status'=>$user['online'], 'sign'=>$user['sign'], 'avatar'=>'/image/upload/'.$user->image['name']];
            return json_encode($arr);
        }


        public function getMsgBox(Request $request)
        {
            $arr = [];
//            $page = $request->input('page');
            $req = FriendRequest::getRequestByFriendId(session('user'));
//            dd($req->toArray());
            foreach ($req as $q) {
                if ($q['userId'] == session('user')){
                    $data = [];
                    $data['id'] = $q['id'];
                    $data['uid'] = session('user');
                    $data['from'] = null;
                    $data['drom_group'] = null;
                    $data['type'] = 1;
                    $data['remark'] = null;
                    $data['href'] = null;
                    $data['read'] = 1;
                    $data['time'] = $q['time'];
                    $data['user'] = ['id'=>null];
                    if ($q['status'] == 1) {
                        $data['content'] = $q->fuser['name'].' 已经同意你的好友申请';
                        $arr['data'][] = $data;
                    }else if($q['status'] == 2){
                        $data['content'] = $q->fuser['name'].' 拒绝了你的好友申请';
                        $arr['data'][] = $data;
                    }
                }else {
                    $data = [];
                    $data['id'] = $q['id'];
                    $data['content'] = '申请添加你为好友';
                    $data['uid'] = session('user');
                    $data['from'] = $q['userId'];
                    $data['drom_group'] = 0;
                    $data['type'] = 1;
                    $data['remark'] = $q['remark'];
                    $data['href'] = null;
                    $data['read'] = 1;
                    $data['status'] = $q['status'];
                    $data['time'] = $q['time'];
                    $data['user'] = ['id'=>$q['userId'], 'avatar'=>'/image/upload/'.$q->user->image['name'], 'username'=>$q->user['name'], 'sign'=>$q->user['sign']];
                    $arr['data'][] = $data;
                }
            }
//            $req = FriendRequest::getRequestByUserId(session('user'));
//            foreach ($req as $q) {}
            if (count($arr) == 0) {
                return json_encode(['code'=>1, 'msg'=>'暂无消息']);
            }

            $arr['code'] = 0;
            $arr['pages'] = $req->toArray()['last_page'];
            return json_encode($arr);
        }

        public function refuseFriendRequest(Request $request)
        {
            $uid = $request->input('uid');
            $b = FriendRequest::refuseFriend($uid);
            $arr = [];
            if ($b) {
                $arr['code'] = 0;
            }else {
                $arr['code'] = 1;
                $arr['msg'] = '操作失败，请稍后重试';
            }
            return json_encode($arr);
        }

        public function readRequest(Request $request)
        {
            $id = $request->input('ids');
            echo $id;
            $arr = explode(',', $id);
            FriendRequest::msgRead($arr);
        }
    }