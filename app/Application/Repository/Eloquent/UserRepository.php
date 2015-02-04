<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Application\Repository\UserRepository as UserRepositoryContract;
use Rpgo\Model\User\UserFactory;
use Rpgo\Application\Repository\Eloquent\Model\User as Eloquent;
use Rpgo\Model\User\User as Model;

class UserRepository extends Repository implements UserRepositoryContract {

    /**
     * @var UserFactory
     */
    private $factory;

    public function __construct(RepositoryManager $manager, UserFactory $factory)
    {
        $this->factory = $factory;
        parent::__construct($manager);
    }

    /**
     * @param string $id
     * @return Model|null
     */
    public function fetchById($id)
    {
        $eloquent = Eloquent::find($id);

        if( ! $eloquent )
            return null;

        return $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->email, $eloquent->password);
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function save(Model $model)
    {
        $eloquent = Eloquent::findOrNew($model->id());

        $eloquent->id = $model->id();
        $eloquent->name = $model->name();
        $eloquent->email = $model->email();
        $eloquent->password = $model->password();

        return $eloquent->save();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model)
    {
        $eloquent = Eloquent::find($model->id());
        return $eloquent->delete();
    }

    /**
     * @param string $name
     * @return Model
     */
    public function fetchByName($name)
    {
        $eloquent = Eloquent::where('name', $name)->first();

        if(!$eloquent)
            return null;

        return $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->email, $eloquent->password);
    }
}
