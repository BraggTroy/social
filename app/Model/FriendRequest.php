<?php
    namespace App\Model;

    use DB;
    use Illuminate\Database\Eloquent\Model;

    class FriendRequest extends Model
    {
        protected $table = 'friend_request';
        public $timestamps = false;
        public $fillable = ['userId', 'friendId', 'time', 'status', 'actTime', 'remark', 'read'];

        public static function addRequest($userId, $friendId, $time, $remark)
        {
            $request = new FriendRequest();
            $request->userId = $userId;
            $request->friendId = $friendId;
            $request->time = $time;
            $request->status = 0;
            $request->remark = $remark;
            $request->read = 0;
            $request->save();
            return $request;
        }

        public static function updateRequest($userId, $friendId, $status, $time)
        {
            $request = FriendRequest::where('userId', $userId)->where('friendId', $friendId)->where('status', 0)->first();
            $request->status = $status;
            $request->actTime = $time;
            $request->save();
        }

        public static function getRequestByFriendId($friendId)
        {
            $res =  FriendRequest::where('friendId', $friendId)->orWhere(function($query) use($friendId){
                $query->where('userId', $friendId)->where('status','<>',0);
            })->orderBy('id', 'desc')->paginate(5);

            $ids = [];
            foreach ($res as $v) {
                $ids[] = $v['id'];
            }
            self::msgRead($ids);
            return $res;
        }

        public static function getRequestByUserId($userId)
        {
            return FriendRequest::where('userId', $userId)->paginate(1);
        }

        public static function getByUFId($friendId)
        {
            return FriendRequest::where('userId', session('user'))->where('friendId', $friendId)->orderBy('id', 'desc')->first();
        }

        public static function refuseFriend($uid)
        {
            $friend = FriendRequest::where('userId', $uid)->where('friendId', session('user'))->where('status', 0)->first();
            $friend->status = 2;
            return $friend->save();
        }

        public static function msgRead($ids)
        {
            $data = ['read'=>1];
            return DB::table('friend_request')->whereIn('id', $ids)->update($data);
        }

        public function user()
        {
            return $this->hasOne('App\Model\User', 'id', 'userId');
        }

        public function fuser()
        {
            return $this->hasOne('App\Model\User', 'id', 'friendId');
        }
    }