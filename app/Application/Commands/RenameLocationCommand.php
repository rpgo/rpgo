<?php namespace Rpgo\Application\Commands;

use Rpgo\Model\Location\Location;

class RenameLocationCommand extends Command {
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $location;

    /**
     * Create a new command instance.
     * @param string $name
     * @param Location $location
     */
	public function __construct($name, Location $location)
	{
        $this->name = $name;
        $this->location = $location;
    }

}
