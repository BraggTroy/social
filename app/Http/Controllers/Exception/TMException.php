<?php
    namespace App\Http\Controllers\Exception;

    use Exception;

    class TMException extends Exception
    {
        public function __construct($code, $params = null)
        {
            $message = $this->codeToMessage($code);
            if (func_num_args() > 1) {
                if ( is_array(func_get_arg(1)) ) {
                    $args = func_get_arg(1);
                }else {
                    $args = func_get_args();
                    array_shift($args);
                }
                array_unshift($args, $message);
                $message = call_user_func_array('sprintf', $args);
            }
            parent::__construct($message, $code);
        }

        public function codeToMessage($code)
        {
            $message = '未知错误';
            switch($code)
            {
                case 4041:
                    $message = '文件上传失败';
                    break;
                case 4042:
                    $message = '发表文章失败';
                    break;
            }
            return $message;
        }
    }