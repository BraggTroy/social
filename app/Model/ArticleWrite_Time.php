<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class ArticleWrite_Time extends Model
    {
        protected $table = 'a_w_time';
        public $timestamps = false;

        protected $fillable = ['articleId', 'writeId', 'userId', 'time'];

        public function getMessageByUserId($user_id, $offset, $size)
        {
            $user = [];
            $myFriend = Friend::getFriendsByUserId($user_id);
            if ($myFriend) {
                foreach ($myFriend as $v) {
                    $user[] = $v['userToId'];
                }
            }
            $a = $this->whereIn('userId', $user)->where('see', 1)
                ->orWhere(
                    function($q) use($user_id) {
                        $q->where('userId', $user_id)->where('see', '<>', 2);
                    }
                )
                ->orWhere('see', 2)
                ->offset($offset)->limit($size)
                ->orderBy('time', 'desc')->get();
            return $a;
        }

        public static function saveAWT($articleId, $writeId, $time, $see)
        {
            $awt = new ArticleWrite_Time();
            $awt['articleId'] = $articleId;
            $awt['writeId'] = $writeId;
            $awt['userId'] = session('user');
            $awt['time'] = $time;
            $awt['see'] = (int)$see;
            $awt->save();
        }
    }