<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Events\WorldWasCreated;
use Rpgo\Application\Services\WorldCreator;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Model\World\World;
use Rpgo\Application\Services\Guard;

class CreateWorldCommandHandler extends CommandHandler {

    /**
     * @var WorldCreator
     */
    private $creator;

	public function __construct(WorldCreator $creator)
	{
		$this->creator = $creator;
    }

    /**
     * Handle the command.
     *
     * @param  CreateWorldCommand $command
     * @return World|null
     */
	public function handle(CreateWorldCommand $command)
	{
        $world = $this->creator->create($command->name, $command->slug, $command->brand, $command->admin, $command->creator);

        if( ! $world)
            return null;

        $this->announce(new WorldWasCreated($world));

        return $world;
	}

}
