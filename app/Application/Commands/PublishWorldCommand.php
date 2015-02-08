<?php namespace Rpgo\Application\Commands;

use Rpgo\Model\World\World;

class PublishWorldCommand extends Command {
    /**
     * @var World
     */
    public $world;

    /**
     * Create a new command instance.
     * @param World $world
     */
	public function __construct(World $world)
	{
		//
        $this->world = $world;
    }

}
