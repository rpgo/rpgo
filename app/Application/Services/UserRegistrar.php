<?php namespace Rpgo\Application\Services;

use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\User\UserFactory;

class UserRegistrar {

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

    public function register($name, $email, $password)
    {
        $user = $this->userFactory->create($name, $email, $password);

        return $this->userRepository->save($user);
    }

}