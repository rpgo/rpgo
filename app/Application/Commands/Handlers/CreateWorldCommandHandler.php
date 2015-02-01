<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Services\WorldCreator;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Support\Guard\Guard;

class CreateWorldCommandHandler {
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

        return $this->creator->create($command->name, $command->slug, $command->brand, $command->member, $user);
	}

}
