<?php

namespace App\Listeners;

use App\Events\VisitEvent;
use App\Model\Visit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  VisitEvent  $event
     * @return void
     */
    public function handle(VisitEvent $event)
    {
        $userId = $event->userId;
        Visit::addVisit($userId);
    }
}
