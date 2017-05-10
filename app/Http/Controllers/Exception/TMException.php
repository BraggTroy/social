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
                case 5005:
                    $message = '创建好友分组失败';
                    break;
                case 5006:
                    $message = '删除好友分组失败';
                    break;
                case 5007:
                    $message = '该分组下还有好友';
                    break;
                case 5008:
                    $message = '修改好友备注失败';
                    break;
                case 5009:
                    $message = '点赞失败';
                    break;
                case 50010:
                    $message = '修改失败';
                    break;
                case 50011:
                    $message = '用户已存在';
                    break;
                case 50012:
                    $message = '密码错误';
                    break;
                case 50013:
                    $message = '用户不存在';
                    break;
                case 50014:
                    $message = '保存失败，请稍后重试';
                    break;
                case 50015:
                    $message = '部分信息保存失败，请稍后重试';
                    break;
                case 50016:
                    $message = '旧密码错误';
                    break;
                case 50017:
                    $message = '修改密码失败';
                    break;
                case 50018:
                    $message = '该邮箱还未注册';
                    break;
            }
            return $message;
        }
    }