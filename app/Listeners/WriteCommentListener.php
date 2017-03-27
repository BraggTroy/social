<?php

namespace App\Listeners;

use App\Events\WriteComment;
use App\Events\WriteCommentEvent;
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
        // TODO 现获取数据库中的值，判断是否要发送通知邮件

        // TODO 保存评论者的用户名
        $write = $event->write;
    }
}
