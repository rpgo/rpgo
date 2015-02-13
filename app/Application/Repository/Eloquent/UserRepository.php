<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Application\Repository\UserRepository as UserRepositoryContract;
use Rpgo\Model\User\Factory as UserFactory;
use Rpgo\Model\User\User as Entity;
use Rpgo\Application\Repository\Eloquent\Model\User as Eloquent;

class UserRepository extends Repository implements UserRepositoryContract {

    /**
     * @var UserFactory
     */
    private $factory;

    public function __construct(RepositoryManager $manager, UserFactory $factory, EloquentAdapter $eloquent)
    {
        $this->factory = $factory;
        parent::__construct($manager);
        $this->eloquent = $eloquent->user();
    }

    /**
     * @param string $name
     * @return Entity
     */
    public function fetchByName($name)
    {
        $eloquent = $this->eloquent->where('name', $name)->first();

        if( ! $eloquent)
            return null;

        return $this->getEntity($eloquent);
    }

    /**
     * @param Entity $user
     * @return array
     */
    protected function getEloquentAttributes($user)
    {
        return [
            'id'       => $user->id(),
            'name'     => $user->name(),
            'email'    => $user->email(),
            'password' => $user->password(),
        ];
    }

    /**
     * @return EloquentAdapter
     */
    protected function eloquent()
    {
        return $this->eloquent;
    }

    /**
     * @param Eloquent $eloquent
     * @return Entity
     */
    protected function getEntity($eloquent)
    {
        $entity = $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->email, $eloquent->password);

        return $entity;
    }
}
