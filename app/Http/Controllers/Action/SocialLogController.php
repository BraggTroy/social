<?php
namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Model\SocialLog;

class SocialLogController extends Controller
{
    public function scanLog()
    {
        $res = SocialLog::getByUserId();
        $arr = [];
        foreach ($res as $q) {
            $data = [];
            $data['image'] = $q->actuser->image['name'];
            $data['name'] = $q->actuser['name'];
            $data['time'] = date('Y-m-d H:i:s', $q['time']);
            $data['content'] = $q['content'];
            $data['lianjie'] = $q['lianjie'];
            $arr['data'][] = $data;
        }
        $arr['pages'] = $res->toArray()['last_page'];
        return json_encode($arr);
    }
}