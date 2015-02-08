<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\LocationRepository as LocationRepositoryContract;
use Rpgo\Application\Repository\RepositoryManager;

class LocationRepository extends Repository implements LocationRepositoryContract {

    /**
     * @param RepositoryManager $manager
     * @param EloquentAdapter $eloquent
     */
    public function __construct(RepositoryManager $manager, EloquentAdapter $eloquent)
    {
        parent::__construct($manager);
        $this->eloquent = $eloquent->location();
    }

    /**
     * @param $eloquent
     * @return mixed
     */
    protected function getEntity($eloquent)
    {
        return $eloquent;
    }

    /**
     * @param $entity
     * @return array
     */
    protected function getEloquentAttributes($entity)
    {
        return [
            'container_id' => $entity->container_id,
            'name' => $entity->name,
            'slug' => $entity->slug,
        ];
    }
}