<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Image;
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
                $write = Write::saveWrite($request->except('image'));
                if ($write) {
                    Image::saveImage($write['id'], $request->only('image'));
                    return json_encode(['code'=>'200']);
                }else {
                    throw new TMException('4042');
                }
            }catch (Exception $e) {
                return ErrorHandle::show_ajax($e->getMessage(), $e->getCode());
            }
        }
    }