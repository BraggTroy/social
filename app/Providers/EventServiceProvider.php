<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\WriteCommentEvent' => [
            'App\Listeners\WriteCommentListener'
        ],
        'App\Events\ArticleCommentEvent' => [
            'App\Listeners\ArticleCommentListener'
        ],
        'App\Events\VisitEvent' => [
            'App\Listeners\VisitListener'
        ],
        'App\Events\ArticleReadEvent' => [
            'App\Listeners\ArticleReadListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
