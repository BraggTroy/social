<?php
    namespace App\Model;


    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;

    class Write extends Model
    {
        // 定义表名
        protected $table = 'write';

        public $timestamps = false;

        // 白名单字段
        protected $fillable = ['userId', 'content', 'time', 'zf', 'see'];

        public static function saveWrite(Request $request)
        {
            $input['userId'] = session('user');
            $input['time'] = time();
            $input['content'] = $request->input('content');
            $input['zf'] = 0;
            $input['see'] = $request->input('see');

            return Write::create($input);
        }
    }