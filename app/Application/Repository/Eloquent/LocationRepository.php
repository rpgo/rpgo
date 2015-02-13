<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\LocationRepository as LocationRepositoryContract;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Model\Location\Factory;
use Rpgo\Model\Location\Location as Entity;
use Rpgo\Application\Repository\Eloquent\Model\Location as Eloquent;

class LocationRepository extends Repository implements LocationRepositoryContract {
    /**
     * @var Factory
     */
    private $factory;

    /**
     * @param RepositoryManager $manager
     * @param Factory $factory
     * @param EloquentAdapter $eloquent
     */
    public function __construct(RepositoryManager $manager, Factory $factory, EloquentAdapter $eloquent)
    {
        parent::__construct($manager);
        $this->factory = $factory;
        $this->eloquent = $eloquent->location();
    }

    /**
     * @param $eloquent
     * @return mixed
     */
    protected function getEntity($eloquent)
    {
        return $this->factory->make($this->getModelData($eloquent));
    }

    /**
     * @param Entity $entity
     * @return array
     */
    protected function getEloquentAttributes($entity)
    {
        return [
            'uuid' => $entity->id(),
            'container_id' => $entity->container() ? $this->eloquentFind($entity->container()->id())->aiid : null,
            'name' => $entity->name(),
            'slug' => $entity->slug(),
        ];
    }

    /**
     * @param Eloquent $eloquent
     * @return array
     */
    private function getModelData($eloquent)
    {
        return [
            'id'   => $eloquent->uuid,
            'name' => $eloquent->name,
            'slug' => $eloquent->slug,
            'container' => $eloquent->container ? $this->getEntity($eloquent->container) : null,
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function eloquentFind($id)
    {
        return $this->eloquent->where('uuid', $id)->first();
    }

    protected function eloquentFindOrNew($id)
    {
        return $this->eloquent->firstOrNew(['uuid' => $id]);
    }
}