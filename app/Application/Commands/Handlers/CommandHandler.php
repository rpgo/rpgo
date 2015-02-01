<?php namespace Rpgo\Application\Commands\Handlers;


use Illuminate\Events\Dispatcher;
use Rpgo\Application\Events\Event;

class CommandHandler {

    public function announce(Event $event)
    {
        app(Dispatcher::class)->fire($event);
    }

}