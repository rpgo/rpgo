<?php namespace Rpgo\Access\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Rpgo\Application\Commands\RegisterUserCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RegisterUserConsole extends Command {

    use DispatchesCommands;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:register';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Register a User.';

	/**
	 * Create a new command instance.
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
        try
        {
            $this->dispatchFromArray(RegisterUserCommand::class, $this->argument());
            $this->info("The user was registered");
        }
        catch(\Exception $e)
        {
            $this->error("Oops. The user could not be registered in the repository.");
            $this->error("Try to ssh into homestead or the user already exists.");
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
			['name', InputArgument::REQUIRED, 'The name of the user.'],
            ['email', InputArgument::REQUIRED, 'The email address of the user.'],
            ['password', InputArgument::REQUIRED, 'The password of the user.'],
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
