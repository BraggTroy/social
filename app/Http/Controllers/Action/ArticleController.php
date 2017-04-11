<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Article;
    use Illuminate\Http\Request;

    class ArticleController extends Controller
    {
        public function submitArticle(Request $request)
        {
            $data = [];
            $data['title'] = $request->input('title');
            $data['$content'] = $request->input('content');
            $data['yc'] = $request->input('yc');
            $data['pl'] = $request->input('pl');
            $data['see'] = $request->input('see');
            $data['wz'] = $request->input('wz');
            if (!Article::saveArticle($data)){
                throw new TMException('5003');
            }
        }

    }