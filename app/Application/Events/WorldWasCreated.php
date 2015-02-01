<?php namespace Rpgo\Application\Events;

use Illuminate\Queue\SerializesModels;
use Rpgo\Model\World\World;

class WorldWasCreated extends Event {

	use SerializesModels;
    /**
     * @var World
     */
    private $world;

    /**
     * Create a new event instance.
     * @param World $world
     */
	public function __construct(World $world)
	{
        $this->world = $world;
    }

}
