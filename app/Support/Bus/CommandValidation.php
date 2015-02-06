<?php namespace Rpgo\Support\Bus;


class CommandValidation {

    public function handle($command, $next)
    {
        if($command instanceof ShouldBeValidated)
            $command->validate();

        return $next($command);
    }

}