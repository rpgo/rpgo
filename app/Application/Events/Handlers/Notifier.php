<?php namespace Rpgo\Application\Events\Handlers;


use Illuminate\Contracts\Queue\ShouldBeQueued;
use Rpgo\Application\Events\Event;

class Notifier implements ShouldBeQueued {

    public function handle(Event $event)
    {
        //dd($event);
    }

}