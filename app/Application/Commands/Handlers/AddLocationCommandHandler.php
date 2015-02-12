<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\AddLocationCommand;

use Illuminate\Queue\InteractsWithQueue;

class AddLocationCommandHandler {

    /**
     * Create the command handler.
     *
     */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  \Rpgo\Application\Commands\AddLocationCommand  $command
	 * @return void
	 */
	public function handle(AddLocationCommand $command)
	{
		dd($command->data());
	}

}
