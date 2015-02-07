<?php namespace Rpgo\Application\Commands\Handlers;

use Rpgo\Application\Commands\RegisterUserCommand;
use Rpgo\Application\Events\UserWasRegistered;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\User\UserFactory;

class RegisterUserCommandHandler extends CommandHandler {

    /**
     * @var UserFactory
     */
    private $userFactory;
    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(UserFactory $userFactory, UserRepository $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

	/**
	 * Handle the command.
	 *
	 * @param  RegisterUserCommand  $command
	 * @return bool
	 */
	public function handle(RegisterUserCommand $command)
	{
        $user = $this->userFactory->create($command->name, $command->email, $command->password);

        if( ! $this->userRepository->save($user))
            return null;

        $this->announce(new UserWasRegistered($user));

        return $user;

	}

}
