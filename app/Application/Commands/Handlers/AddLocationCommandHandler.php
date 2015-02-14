<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\AddLocationCommand;

use Illuminate\Queue\InteractsWithQueue;
use Rpgo\Application\Repository\LocationRepository;
use Rpgo\Model\Location\Factory;

class AddLocationCommandHandler {

    /**
     * @var LocationRepository
     */
    private $repository;
    /**
     * @var Factory
     */
    private $factory;

    /**
     * Create the command handler.
     * @param LocationRepository $repository
     * @param Factory $factory
     */
	public function __construct(LocationRepository $repository, Factory $factory)
	{
        $this->repository = $repository;
        $this->factory = $factory;
    }

    /**
     * Handle the command.
     *
     * @param  \Rpgo\Application\Commands\AddLocationCommand $command
     * @return bool|null|\Rpgo\Model\Location\Location
     */
	public function handle(AddLocationCommand $command)
	{
        $slug = str_slug($command->data()['name']);

        $location = $this->factory->make(array_merge($command->data(),compact('slug')));

        if( ! $this->repository->save($location) )
            return null;

        return $location;
	}

}
