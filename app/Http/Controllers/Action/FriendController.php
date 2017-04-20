<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Friend;
    use App\Model\FriendGroup;
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

    }