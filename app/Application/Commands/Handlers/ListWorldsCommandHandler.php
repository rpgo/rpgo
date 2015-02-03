<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\ListWorldsCommand;
use Rpgo\Application\Repository\WorldRepository;
use Rpgo\Support\Collection\Collection;

class ListWorldsCommandHandler extends CommandHandler {
    /**
     * @var WorldRepository
     */
    private $worlds;

    /**
     * Create the command handler.
     * @param WorldRepository $worlds
     */
	public function __construct(WorldRepository $worlds)
	{
        $this->worlds = $worlds;
    }

	/**
	 * Handle the command.
	 *
	 * @param ListWorldsCommand $command
     * @return Collection
	 */
	public function handle(ListWorldsCommand $command)
	{
        if($command->published)
            return $this->worlds->fetchAllPublished();

        return $this->worlds->fetchAll();
	}

}
