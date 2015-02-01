<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\RegisterUserCommand;

use Illuminate\Queue\InteractsWithQueue;
use Rpgo\Application\Events\UserWasRegistered;
use Rpgo\Application\Services\UserRegistrar;
use Rpgo\Support\Guard\Guard;

class RegisterUserCommandHandler extends CommandHandler {

    /**
     * @var Guard
     */
    private $guard;

    /**
     * @var UserRegistrar
     */
    private $registrar;

    /**
     * Create the command handler.
     * @param Guard $guard
     * @param UserRegistrar $registrar
     */
	public function __construct(Guard $guard, UserRegistrar $registrar)
	{
        $this->guard = $guard;
        $this->registrar = $registrar;
    }

	/**
	 * Handle the command.
	 *
	 * @param  RegisterUserCommand  $command
	 * @return bool
	 */
	public function handle(RegisterUserCommand $command)
	{
		$user = $this->registrar->register($command->name, $command->email, $command->password);

        if( ! $user)
            return false;

        $this->guard->login($command->email, $command->password);

        $this->announce(new UserWasRegistered($user));

        return true;

	}

}
