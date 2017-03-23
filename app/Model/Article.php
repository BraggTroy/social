<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Article extends Model
    {
        protected $table = 'article';
        protected $timestamps = false;

        // 白名单字段
        protected $fillable = ['userId', 'content', 'time', 'see', 'hasImg'];

        public static function saveArticle(Array $arr, $hasImg=0)
        {
            $input['userId'] = session('user');
            $input['time'] = time();
            $input['content'] = $arr['content'];
            $input['see'] = $arr['see'];
            $input['hasImg'] = $hasImg;
            return Write::create($input);
        }

        public function getShowArticleByUserId($userId)
        {
            $article = [];
            $myFriend = Friend::getFriendsByUserId($userId);
            if ($myFriend) {
                $friendId = [];
                foreach ($myFriend as $friend) {
                    $friendId[] = $friend['userToId'];
                }
                $friendWrites = $this->getArticlesFriendCanSee($friendId);
                foreach ($friendWrites as &$v) {
                    if ($v['hasImg']) {
                        $v['image'] = ImageArticle::getImgByWriteId($v['id']);
                    }
                    $article[] = $v;
                }
            }
            $allSeeWrite =  $this->getArticlesAllCanSee();
            if ($allSeeWrite) {
                foreach ($allSeeWrite as &$v) {
                    if ($v['hasImg']) {
                        $v['image'] = ImageArticle::getImgByWriteId($v['id']);
                    }
                    $article[] = $v;
                }
            }
            return $article;
        }

        public function getArticlesFriendCanSee(Array $userIds)
        {
            $where = [
                ['userID', 'in', $userIds],
                ['see', '=', '1']
            ];
            return Article::where($where)->get();
        }

        public function getArticlesAllCanSee()
        {
            $where = [
                'see' => 2
            ];
            return Article::where($where)->get();
        }

        public function getArticlesOwnSee($userId)
        {
            $where = [
                'userId' => $userId,
                'see' => 0
            ];
            return Article::where($where)->get();
        }
    }