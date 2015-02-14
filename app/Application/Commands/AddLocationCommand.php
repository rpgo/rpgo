<?php namespace Rpgo\Application\Commands;

use Rpgo\Model\Location\Location;

class AddLocationCommand extends Command {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Location
     */
    protected $container;

    /**
     * Create a new command instance.
     * @param string $name
     * @param Location $container
     */
	public function __construct($name, Location $container)
	{
        $this->name = $name;
        $this->container = $container;
    }

}
