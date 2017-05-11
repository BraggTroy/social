<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Friend;
    use App\Model\FriendGroup;
    use App\Model\FriendRequest;
    use App\Model\User;
    use Illuminate\Http\Request;

    class FriendController extends Controller
    {
        public function showFriend($groupId = 0)
        {
            if ($groupId == 0){
                $friend = $this->getFriendByUser(session('user'));
            }else {
                $friend = $this->getFriendsByGroup($groupId);
            }
            $user = User::getUserById(session('user'));
            return view('myapp.friend', ['friend'=>$friend, 'user'=>$user]);
        }

        public function getFriendGroup($userId)
        {
            $group = FriendGroup::getGroupByUserId($userId);
            return $group;
        }

        public function getFriendsByGroup($groupId)
        {
            return Friend::getFriendsByGroupId($groupId);
        }

        public function getFriendByUser($userId)
        {
            return Friend::getFriendsByUserId($userId);
        }

        public function getGroupByUser($userId)
        {
            return FriendGroup::getGroupByUserId($userId);
        }

        public function addGroup(Request $request)
        {
            $name = $request->input('content');
            $group = FriendGroup::createGroup($name);
            if ($group) {
                return $group['id'];
            }else {
                throw new TMException('5005');
            }
        }

        public function delGroup(Request $request)
        {
            $groupId = $request->input('id');
            $friend = Friend::getFriendsByGroupId($groupId);
            if (isset($friend[0])) {
                throw new TMException('5007');
            }
            $g = FriendGroup::delGroup($groupId);
            if (!$g) {
                throw new TMException('5006');
            }
        }

        public function delFriend(Request $request)
        {
            $uid = $request->input('uid');
            $fid = $request->input('fid');
            Friend::delFriendByUF($uid, $fid);
            Friend::delFriendByUF($fid, $uid);
        }


        public function changeName(Request $request)
        {
            $name = $request->input('content');
            $id = $request->input('id');
            if(!Friend::changeNameById($id, $name)){
                throw new TMException('5008');
            }
        }

        public function addFriend(Request $request)
        {
            $friendId = $request->input('friendId');
            $remark = $request->input('remark');
            $fr = FriendRequest::getByUFId($friendId);
            if ($fr) {
                if ($fr['status'] == 0) {
                    $fr->time = time();
                    $fr->remark = $remark;
                    $fr->save();
                }else {
                    if(!FriendRequest::addRequest(session('user'), $friendId, time(), $remark)){
                        throw new TMException('50019');
                    }
                }
            }else {
                if(!FriendRequest::addRequest(session('user'), $friendId, time(), $remark)){
                    throw new TMException('50019');
                }
            }
        }

        public function agreeFriend(Request $request)
        {
            $fid = $request->input('uid');
            $group = $request->input('group');
            $arr = [];
            $arr['friendId'] = $fid;
            $arr['groupId-b'] = $group;
            $arr['groupId-f'] = FriendGroup::getDefault($fid)['id'];
            $arr['nickname-b'] = '';
            $arr['nickname-f'] = '';
            Friend::addFriend($arr);
            FriendRequest::updateRequest($fid, session('user'), 1, time());
        }

        public function refuseFriend(Request $request)
        {
            $fid = $request->input('uid');
            $user = session('user');
            FriendRequest::updateRequest($fid, $user, 2, time());
        }

    }