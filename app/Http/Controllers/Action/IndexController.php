<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\ImageWrite;
    use App\Model\Write;
    use Illuminate\Http\Request;
    use League\Flysystem\Exception;

    class IndexController extends Controller
    {
        public function index()
        {
            $write = new Write();
            $write->getShowWriteByUserId(session('user'));
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
    }