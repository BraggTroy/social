<?php
    namespace App\Model;


    use Illuminate\Database\Eloquent\Model;

    class Write extends Model
    {
        // 定义表名
        protected $table = 'write';

        public $timestamps = false;

        // 白名单字段
        protected $fillable = ['userId', 'content', 'time', 'zf', 'see', 'hasImg'];

        public static function saveWrite(Array $arr, $hasImg=0)
        {
            $input['userId'] = session('user');
            $input['time'] = time();
            $input['content'] = $arr['content'];
            $input['zf'] = 0;
            $input['see'] = $arr['see'];
            $input['hasImg'] = $hasImg;
            return Write::create($input);
        }

        public static function fj($id)
        {
            $write = Write::find($id);
            $write->state = $write['state'] == 0 ? 1 : 0;
            $write->save();
        }

        public function getShowWriteByUserId($userId)
        {
            $write = [];
            $myFriend = Friend::getFriendsByUserId($userId);
            if ($myFriend) {
                $friendId = [];
                foreach ($myFriend as $friend) {
                    $friendId[] = $friend['userToId'];
                }
                $friendWrites = $this->getWritesFriendCanSee($friendId);
                foreach ($friendWrites as &$v) {
                    if ($v['hasImg']) {
                        $v['image'] = ImageWrite::getImgByWriteId($v['id']);
                    }
                    $write[] = $v;
                }
            }
            $allSeeWrite =  $this->getWritesAllCanSee();
            if ($allSeeWrite) {
                foreach ($allSeeWrite as &$v) {
                    if ($v['hasImg']) {
                        $v['image'] = ImageWrite::getImgByWriteId($v['id']);
                    }
                    $write[] = $v;
                }
            }
            return $write;
        }

        public static function getHomeWrite($userId)
        {
            if ($userId == session('user')) {
                return Write::where('userId', $userId)->get();
            }
            else if (in_array(session('user'), self::zh($userId))) {
                return Write::where('userId', $userId)->where('see','<>', 0)->get();
            }else {
                return Write::where('userId', $userId)->where('see', 2)->get();
            }
        }

        public static function zh($userId)
        {
            $arr = [];
            $friend = Friend::getFriendsByUserId($userId);
            foreach ($friend as $f) {
                $arr[] = $f['friendId'];
            }
            return $arr;
        }

        public function getWritesFriendCanSee(Array $userIds)
        {
            return Write::whereIn('userID', $userIds)->where('see', '1')->get();
        }

        public function getWritesAllCanSee()
        {
            return Write::where('see', 2)->get();
        }

        public function getWritesOwnSee($userId)
        {
            $where = [
                'userId' => $userId,
                'see' => 2
            ];
            return Write::where($where)->get();
        }

        public static function getWritesByIds($write_ids)
        {
            return Write::whereIn('id', $write_ids)->get();
        }

        public static function getWriteById($write_id)
        {
            return Write::where('id', $write_id)->first();
        }

        public function image()
        {
            return $this->hasMany('App\Model\ImageWrite', 'writeId', 'id');
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }

        public function comment()
        {
            return $this->hasMany('App\Model\CommentWrite', 'writeId', 'id');
        }

        public function wzan()
        {
            return $this->hasMany('App\Model\WriteZan', 'writeId', 'id');
        }

        public static function admingetFem()
        {
            return Write::orderBy('id', 'desc')->get();
        }
    }