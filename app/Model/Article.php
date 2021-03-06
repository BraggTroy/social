<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Article extends Model
    {
        protected $table = 'article';
        public $timestamps = false;

        // 白名单字段
        protected $fillable = ['userId', 'content', 'time', 'title', 'see', 'canpl', 'yc', 'wz'];

        public static function saveArticle(Array $arr)
        {
            $input['userId'] = session('user');
            $input['time'] = $arr['time'];
            $input['content'] = $arr['content'];
            $input['see'] = $arr['see'];
            $input['canpl'] = $arr['canpl'];
            $input['yc'] = $arr['yc'];
            $input['wz'] = $arr['wz'];
            $input['title'] = $arr['title'];
            return Article::create($input);
        }

        public static function fj($id)
        {
            $article = Article::find($id);
            $article->state = $article['state'] == 0 ? 1 : 0;
            $article->save();
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

        public static function getHomeArticle($userId)
        {
            if ($userId == session('user')) {
                return Article::where('userId', $userId)->get();
            }
            else if (in_array(session('user'), self::zh($userId))) {
                return Article::where('userId', $userId)->where('see','<>', 0)->get();
            }else {
                return Article::where('userId', $userId)->where('see', 2)->get();
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

        public function getArticlesFriendCanSee(Array $userIds)
        {
            return Article::whereIn('userID', $userIds)->where('see', '1')->get();
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

        public static function getArticlesByIds($article_ids)
        {
            return Article::whereIn('id', $article_ids)->get();
        }

        public static function getArticleById($article_id)
        {
            return Article::where('id', $article_id)->first();
        }

        public function image()
        {
            return $this->hasMany('App\Model\ImageArticle', 'articleId', 'id');
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }

        public function comment()
        {
            return $this->hasMany('App\Model\CommentArticle', 'articleId', 'id');
        }


        public static function adminGet()
        {
            return Article::orderBy('id', 'desc')->get();
        }
    }