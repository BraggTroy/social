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
            $http_code = substr($code, 0, 3);
            self::send_http_status($http_code);
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
            $status = array(
                200 => 'OK',
                301 => 'Moved Permanently',
                302 => 'Moved Temporarily ',
                400 => 'Bad Request',
                401 => 'Unauthorized',
                403 => 'Forbidden',
                404 => 'Not Found',
                500 => 'Internal Server Error',
                503 => 'Service Unavailable',
            );
            $str = isset($status[$http_code]) ? (' ' . $status[$http_code]) : '';
            header("HTTP/1.1 $http_code$str");
        }
    }