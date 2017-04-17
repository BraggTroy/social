<?php
    namespace App\Http\Controllers\Exception;

    use Exception;

    class TMException extends Exception
    {
        public function __construct($code, $params = null)
        {
            $message = $this->codeToMessage($code);
            $code = substr($code,0,3);
            parent::__construct($message, $code);
        }

        public function codeToMessage($code)
        {
            $message = '未知错误';
            switch($code)
            {
                case 4041:
                    $message = '文件保存失败';
                    break;
                case 40411:
                    $message = '文件上传失败';
                    break;
                case 40412:
                    $message = '文件删除失败';
                    break;
                case 4042:
                    $message = '发表文章失败';
                    break;
                case 5001:
                    $message = '注册失败，请稍后重试';
                    break;
                case 5002:
                    $message = '发表评论失败';
                    break;
                case 5003:
                    $message = '发表文章失败';
                    break;
                case 5004:
                    $message = '该相册下还有图片';
                    break;
            }
            return $message;
        }
    }