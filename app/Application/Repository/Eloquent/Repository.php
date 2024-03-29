<?php namespace Rpgo\Application\Repository\Eloquent;


use Rpgo\Application\Repository\Eloquent\Model\Eloquent;
use Rpgo\Application\Repository\Eloquent\Model\User;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Support\Collection\Collection;

abstract class Repository {

    /**
     * @var RepositoryManager
     */
    private $manager;

    /**
     * @var array
     */
    protected $with = [];

    /**
     * @var Eloquent
     */
    protected $eloquent;

    public function __construct(RepositoryManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return \Rpgo\Application\Repository\UserRepository
     */
    public function user()
    {
        return $this->manager->user();
    }

    /**
     * @return \Rpgo\Application\Repository\WorldRepository
     */
    public function world()
    {
        return $this->manager->world();
    }

    /**
     * @return \Rpgo\Application\Repository\MemberRepository
     */
    public function member()
    {
        return $this->manager->member();
    }


    /**
     * @return \Rpgo\Application\Repository\MemberRepository
     */
    public function location()
    {
        return $this->manager->location();
    }


    /**
     * @return Collection
     */
    public function fetchAll()
    {
        $eloquents = $this->eloquent
            ->all();

        return $this->getEntities($eloquents);

    }

    /**
     * @param $entity
     * @return bool
     */
    public function save($entity)
    {
        $eloquent = $this->eloquentFindOrNew($entity->id());

        $data = $this->getEloquentAttributes($entity);

        $eloquent->fill($data);

        return $eloquent->save();
    }

    /**
     * @param string $id
     * @return mixed|null
     */
    public function fetchById($id)
    {
        $eloquent = $this->eloquentFind($id);

        if( ! $eloquent )
            return null;

        return $this->getEntity($eloquent);
    }

    /**
     * @param $entity
     * @return bool|null
     */
    public function delete($entity)
    {

        $eloquent = $this->eloquentFind($entity->id());

        if( ! $eloquent )
            return null;

        return $eloquent->delete();
    }

    /**
     * @param $eloquents
     * @return Collection
     */
    protected function getEntities($eloquents)
    {
        $entities = new Collection();

        foreach ($eloquents as $eloquent) {

            $world = $this->getEntity($eloquent);

            $entities->add($world);
        }

        return $entities;
    }

    public function with($relationship)
    {
        $this->with[] = $relationship;

        return $this;
    }

    public function without($relationship)
    {
        unset($this->with[array_search($relationship, $this->with)]);

        return $this;
    }

    /**
     * @param $eloquent
     * @return mixed
     */
    abstract protected function getEntity($eloquent);

    /**
     * @param $entity
     * @return array
     */
    abstract protected function getEloquentAttributes($entity);

    /**
     * @param $id
     * @return mixed
     */
    protected function eloquentFind($id)
    {
        return $this->eloquent->find($id);
    }

    protected function eloquentFindOrNew($id)
    {
        return $this->eloquent->findOrNew($id);
    }

}