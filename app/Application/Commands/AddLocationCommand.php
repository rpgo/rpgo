<?php namespace Rpgo\Application\Commands;

use Rpgo\Model\Location\Location;

class AddLocationCommand extends Command {

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $slug;
    /**
     * @var Location
     */
    protected $container;

    /**
     * Create a new command instance.
     * @param string $name
     * @param string $slug
     * @param Location $container
     */
	public function __construct($name, $slug, Location $container = null)
	{
        $this->name = $name;
        $this->slug = $slug;
        $this->container = $container;
    }

}
