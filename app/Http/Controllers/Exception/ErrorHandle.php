<?php
    namespace App\Http\Controllers\Exception;

    use App\Http\Controllers\Controller;

    class ErrorHandle extends Controller
    {
        // 重定向到错误页面
        public static function show_page($msg='', $code='', $title='', $params='')
        {

        }

        // ajax返回错误状态马，错误信息
        public static function show_ajax($msg='', $code='', $title='', $params='')
        {
            $data = self::getError($msg, $code, $title, $params);
            return json_encode($data);
        }

        // 获取错误信息
        public static function getError($msg='', $code='', $title='', $params='')
        {
            $data = ['error_code' => $code, 'error_msg' => $msg];
            $title && $data['error_title'] = $title;
            $params && $data['error_params'] = $params;
            return $data;
        }

        public static function send_http_status($http_code)
        {

        }
    }