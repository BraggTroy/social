<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Article;
    use App\Model\ImageWrite;
    use App\Model\Write;
    use Illuminate\Http\Request;
    use League\Flysystem\Exception;

    class IndexController extends Controller
    {
        public function index()
        {
            $w = new Write();
            $write = $w->getShowWriteByUserId(session('user'));
            $a = new Article();
            $article = $a->getShowArticleByUserId(session('user'));

            $total = [];
            foreach ($write as $wv) {
                $total[] = $wv;
            }
            foreach ($article as $av) {
                $total[] = $av;
            }

            //自定义排序
            usort($total, 'sortByTime');

            return view('myapp.index')->with('data', $total);
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
        private function sortByTime($a, $b)
        {
            if ($a['time'] > $b['time']) {
                return 1;
            }elseif($a['time'] == $b['time']) {
                return $a['id'] > $b['id'] ? 1 : -1;
            }
        }
    }