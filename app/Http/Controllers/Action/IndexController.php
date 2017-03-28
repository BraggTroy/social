<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Article;
    use App\Model\ArticleWrite_Time;
    use App\Model\ImageWrite;
    use App\Model\User;
    use App\Model\Write;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use League\Flysystem\Exception;

    class IndexController extends Controller
    {
        /**
         * @param int $offset 偏移量
         * @param int $size 查询条数
         * @return View
         */
        public function index($offset = 0, $size = 10)
        {
            $a_w = new ArticleWrite_Time();
            $message = $a_w->getMessageByUserId(session('user'), $offset, $size);

            $articleId = [];
            $writeId = [];
            foreach ($message as $v) {
                if ($v['articleId'] == 0) {
                    $writeId[] = $v['writeId'];
                }else {
                    $articleId[] = $v['articleId'];
                }
            }

            $writes = Write::getWritesByIds($writeId);
            $articles = Article::getArticlesByIds($articleId);

            $total = [];
            foreach ($writes as $v) {
                $total[] = $v;
            }
            foreach ($articles as $v) {
                $total[] = $v;
            }
            //自定义排序
            usort($total, array('App\Http\Controllers\Action\IndexController', 'sortByTime'));

            $user = User::getUserById(session('user'));
            return view('myapp.index', ['data' => $total, 'me' => $user]);
        }

        public function submitWrite(Request $request)
        {
            try {
                $hasImg = isset($request->input('image')['image']) ? 1 : 0;
                $write = Write::saveWrite($request->except('image'), $hasImg);
                if ($write) {
                    ImageWrite::saveImage($write['id'], $request->only('image'), $hasImg);
                    return json_encode(['code'=>'200']);
                }else {
                    throw new TMException('4042');
                }
            }catch (Exception $e) {
                return ErrorHandle::show_ajax($e->getMessage(), $e->getCode());
            }
        }

        // 自定义排序
        protected function sortByTime($a, $b)
        {
            if ($a['time'] > $b['time']) {
                return 1;
            }elseif($a['time'] == $b['time']) {
                return $a['id'] > $b['id'] ? 1 : -1;
            }
        }
    }