<?php namespace Rpgo\Support\Bus;


class CommandValidation {

    public function handle($command, $next)
    {
        if(method_exists($command, 'validate'))
            $command->validate();

        return $next($command);
    }

}