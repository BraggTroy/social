<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Model\Write;
    use Illuminate\Http\Request;

    class IndexController extends Controller
    {
        public function index()
        {

        }

        public function submitWrite(Request $request)
        {
            Write::saveWrite($request);
        }
    }