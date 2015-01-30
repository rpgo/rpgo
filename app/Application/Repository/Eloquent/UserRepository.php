<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\UserRepository as UserRepositoryContract;
use Rpgo\Model\Contracts\User\UserFactory;
use Rpgo\Application\Repository\Eloquent\User as Eloquent;

class UserRepository implements UserRepositoryContract {

    /**
     * @var UserFactory
     */
    private $factory;

    /**
     * @var User
     */
    private $eloquent;

    public function __construct(UserFactory $factory)
    {
        $this->factory = $factory;
    }

    public function model(Eloquent $user)
    {
        return $this->factory->revive($user->id, $user->name, $user->email, $user->password);
    }
}
