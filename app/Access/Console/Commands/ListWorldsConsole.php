<?php namespace Rpgo\Access\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Rpgo\Application\Commands\ListWorldsCommand;
use Rpgo\Support\Collection\Collection;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ListWorldsConsole extends Command {

    use DispatchesCommands;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'world:list';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'List the existing worlds.';

    /**
     * Create a new command instance.
     *
     */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$worlds = $this->dispatch(new ListWorldsCommand( ! $this->option('all')));

        if( ! count($worlds) )
        {
            $this->info("There are no worlds.");
            return;
        }

        $worlds = $this->listWorlds($worlds);

        $this->table(
            ['name', 'creator', 'members'],
            $worlds
        );
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			//['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['all', null, InputOption::VALUE_NONE, 'List the unpublished worlds, too.', null],
		];
	}

    private function listWorlds(Collection $worlds)
    {
        return $worlds->transform(function($world){
            return [$world->name(), $world->creator()->name(), count($world->members())];
        })->toArray();
    }

}
