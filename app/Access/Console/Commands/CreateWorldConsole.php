<?php namespace Rpgo\Access\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Rpgo\Application\Commands\CreateWorldCommand;
use Rpgo\Application\Repository\UserRepository;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateWorldConsole extends Command {

    use DispatchesCommands;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'world:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new World.';
    /**
     * @var UserRepository
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @param UserRepository $user
     */
	public function __construct(UserRepository $user)
	{
		parent::__construct();
        $this->user = $user;
    }

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $creator = $this->user->fetchByName($this->argument('creator'));

        if(! $creator)
        {
            $this->error("The user doesn't exists.");
            return;
        }

        try
        {
            $this->dispatchFromArray(
                CreateWorldCommand::class,
                array_merge($this->argument(),compact('creator'))
            );
            $this->info("The world was created.");
        }
        catch(\Exception $e)
        {
            $this->error("Oops. The world could not be created.");
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of the World.'],
            ['brand', InputArgument::REQUIRED, 'The brand of the World.'],
            ['slug', InputArgument::REQUIRED, 'The slug of the World.'],
            ['admin', InputArgument::REQUIRED, 'The admin of the World.'],
            ['creator', InputArgument::REQUIRED, 'The creator of the World.'],
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
			//['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
