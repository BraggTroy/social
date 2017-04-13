<?php

namespace App\Events;

use App\Model\WriteComment;
use Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WriteCommentEvent extends Event
{
    use InteractsWithSockets, SerializesModels;

    public $write;
    /**
     * Create a new event instance.
     *
     */
    public function __construct(WriteComment $write)
    {
        $this->write = $write;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
