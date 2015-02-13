<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\LocationRepository as LocationRepositoryContract;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Model\Location\Factory;
use Rpgo\Model\Location\Location as Entity;
use Rpgo\Application\Repository\Eloquent\Model\Location as Eloquent;
use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

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
     * @return Eloquent
     */
    protected function eloquentFind($id)
    {
        return $this->eloquent->where('uuid', $id)->first();
    }

    protected function eloquentFindOrNew($id)
    {
        return $this->eloquent->firstOrNew(['uuid' => $id]);
    }

    public function fetchByWorldAndPath(World $world, array $path)
    {
        $slug = end($path);

        array_shift($path);

        $root = $this->eloquentFind($world->location()->id());

        $eloquent = $this->getByPath($root, $path);

        if(! $eloquent )
            $eloquent = $root;

        if( $eloquent->slug != $slug )
            return null;

        return $this->getEntity($eloquent);
    }

    /**
     * @param Eloquent $tree
     * @param $path
     * @return Collection
     */
    private function getByPath($tree, array $path)
    {
        if( empty($path) || ! $tree->hasChildren())
            return $tree;

        $slug = array_shift($path);

        foreach($tree->children as $node)
            if($node->slug == $slug)
                return $this->getByPath($node->children, $path);
    }
}