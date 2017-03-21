<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Write;
    use Illuminate\Http\Request;
    use League\Flysystem\Exception;

    class IndexController extends Controller
    {
        public function index()
        {

        }

        public function submitWrite(Request $request)
        {
            try {
                $write = Write::saveWrite($request);
                if ($write) {
                    return json_encode(['code'=>'200']);
                }
                throw new TMException('404');
            }catch (Exception $e) {
                return ErrorHandle::show_ajax($e->getMessage(), $e->getCode());
            }
        }
    }