<?php

namespace App\Listeners;

use App\Events\ArticleCommentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleCommentListener
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
     * @param  ArticleCommentEvent  $event
     * @return void
     */
    public function handle(ArticleCommentEvent $event)
    {
        //
    }
}
