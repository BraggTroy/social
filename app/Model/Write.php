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

        public static function saveWrite(Array $arr)
        {
            $input['userId'] = session('user');
            $input['time'] = time();
            $input['content'] = $arr['content'];
            $input['zf'] = 0;
            $input['see'] = $arr['see'];
            return Write::create($input);
        }
    }