<?php

namespace App\Listeners;

use App\Events\WriteComment;
use App\Events\WriteCommentEvent;
use App\Jobs\SendEmail;
use App\Model\UserSetting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WriteCommentListener
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WriteCommentEvent  $event
     * @return void
     */
    public function handle(WriteCommentEvent $event)
    {
        $set = UserSetting::getUserSettingById($event->write['userId']);
        //TODO 判断是否开启通知
        if ($set['comment']) {
            //TODO 详细信息
            $data = [];
            dispatch(new SendEmail($data));
        }
    }
}
