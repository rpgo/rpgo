<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\UserRepository as UserRepositoryContract;
use Rpgo\Model\User\UserFactory;
use Rpgo\Application\Repository\Eloquent\User as Eloquent;
use Rpgo\Model\User\User as Model;

class UserRepository implements UserRepositoryContract {

    /**
     * @var UserFactory
     */
    private $factory;

    public function __construct(UserFactory $factory)
    {
        $this->factory = $factory;
    }

    public function model(Eloquent $user)
    {
        return $this->factory->revive($user->id, $user->name, $user->email, $user->password);
    }

    public function fetchById($id)
    {
        $user = Eloquent::find($id);
        return $this->factory->revive($user->id, $user->name, $user->email, $user->password);
    }

    public function save(Model $user)
    {
        $eloquent = Eloquent::findOrNew($user->id());

        $eloquent->id = $user->id();
        $eloquent->name = $user->name();
        $eloquent->email = $user->email();
        $eloquent->password = $user->password();

        return $eloquent->save();
    }

    /**
     * @param Model $user
     * @return bool
     */
    public function delete(Model $user)
    {
        $eloquent = Eloquent::find($user->id());
        return $eloquent->delete();
    }
}
