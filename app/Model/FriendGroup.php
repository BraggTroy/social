<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class FriendGroup extends Model
    {
        protected $table = "friend-group";
        public $timestamps = false;
        public $fillable = ['name', 'userId'];

        public static function addGroup($userId)
        {
            $group = new FriendGroup();
            $group->name = '我的好友';
            $group->userId = $userId;
            $group->save();
            return $group;
        }

        public static function createGroup($name)
        {
            $group = new FriendGroup();
            $group->name = $name;
            $group->userId = session('user');
            $group->save();
            return $group;
        }

        public static function getGroupByUserId($id)
        {
            return FriendGroup::where('userId', $id)->get();
        }

        public static function delGroup($groupId)
        {
            return FriendGroup::where('id', $groupId)->delete();
        }

        public function friend()
        {
            return $this->hasMany('App\Model\Friend','groupId', 'id');
        }

    }