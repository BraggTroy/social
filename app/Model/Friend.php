<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Friend extends Model
    {
        // 定义表名
        protected $table = 'friend';

        public $timestamps = false;
        public $fillable = ['userId', 'friendId', 'groupId', 'nickname'];

        public static function getFriendsByUserId($user_id)
        {
            return Friend::where('userId', $user_id)->get();
        }

        public static function  getFriendsByGroupId($groupId)
        {
            return Friend::where('groupId', $groupId)->where('userId', session('user'))->get();
        }

        public static function changeNameById($id, $name)
        {
            $friend = Friend::find($id);
            $friend->nickname = $name;
            return $friend->save();
        }

        public static function delFriendById($id)
        {
            return Friend::where('id', $id)->delete();
        }

        public static function addFriend($arr)
        {
            $friend = new Friend();
            $friend->userId = session('user');
            $friend->firendId = $arr['friendId'];
            $friend->groupId = $arr['groupId'];
            $friend->nickname = $arr['nickname'];
            $friend->save();
            $friend1 = new Friend();
            $friend1->userId = $arr['friendId'];
            $friend1->firendId = session('user');
            $friend1->groupId = $arr['groupId'];
            $friend1->nickname = $arr['nickname'];
            $friend1->save();
            return $friend;
        }

        public static function delFriendByUF($uid, $fid)
        {
            return Friend::where('userId', $uid)->where('friendId', $fid)->delete();
        }

        public function group()
        {
            return $this->belongsTo('App\Model\FriendGroup', 'groupId', 'id');
        }

        public function user()
        {
            return $this->hasOne('App\Model\User', 'id', 'friendId');
        }
    }