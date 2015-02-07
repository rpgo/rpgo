<?php namespace Rpgo\Support\Bus;


use Illuminate\Contracts\Container\Container;

class CommandValidation {

    /**
     * @var Container
     */
    private $container;

    function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function handle($command, $next)
    {
        if($command instanceof ShouldBeValidated)
            $command->validate();

        return $next($command);
    }

}