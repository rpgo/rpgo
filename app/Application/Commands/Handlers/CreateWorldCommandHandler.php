<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Events\WorldWasCreated;
use Rpgo\Application\Services\WorldCreator;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Support\Guard\Guard;

class CreateWorldCommandHandler extends CommandHandler {
    /**
     * @var Guard
     */
    private $guard;
    /**
     * @var WorldCreator
     */
    private $creator;

	public function __construct(Guard $guard, WorldCreator $creator)
	{
		//
        $this->guard = $guard;
        $this->creator = $creator;
    }

    /**
     * Handle the command.
     *
     * @param  CreateWorldCommand $command
     * @return bool
     */
	public function handle(CreateWorldCommand $command)
	{
        $user = $this->guard->user();

        $world = $this->creator->create($command->name, $command->slug, $command->brand, $command->member, $user);

        if( ! $world)
            return false;

        $this->announce(new WorldWasCreated($world));

        return true;
	}

}