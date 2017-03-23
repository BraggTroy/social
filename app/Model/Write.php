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

        public function getWritesFriendCanSee(Array $userIds)
        {
            $where = [
                ['userID', 'in', $userIds],
                ['see', '=', '1']
            ];
            return Write::where($where)->get();
        }

        public function getWritesAllCanSee()
        {
            $where = [
                'see' => 2
            ];
            return Write::where($where)->get();
        }

        public function getWritesOwnSee($userId)
        {
            $where = [
                'userId' => $userId,
                'see' => 2
            ];
            return Write::where($where)->get();
        }
    }