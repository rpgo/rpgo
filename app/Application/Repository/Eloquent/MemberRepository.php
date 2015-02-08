<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Eloquent as EloquentAdapter;
use Rpgo\Application\Repository\MemberRepository as MemberRepositoryContract;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Model\Member\Member as Entity;
use Rpgo\Application\Repository\Eloquent\Model\Member as Eloquent;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

class MemberRepository extends Repository implements MemberRepositoryContract {

    /**
     * @var MemberFactory
     */
    private $factory;

    /**
     * @param RepositoryManager $manager
     * @param MemberFactory $factory
     * @param EloquentAdapter $eloquent
     */
    public function __construct(RepositoryManager $manager, MemberFactory $factory, EloquentAdapter $eloquent)
    {
        $this->factory = $factory;
        parent::__construct($manager);
        $this->eloquent = $eloquent->member();
    }

    /**
     * @param World $world
     * @return Collection
     */
    public function fetchAllForWorld(World $world)
    {
        $eloquents = $this->eloquent
            ->where('world_id', $world->id())
            ->get();

        return $this->getEntities($eloquents);
    }

    /**
     * @param Entity $member
     * @return array
     */
    protected function getEloquentAttributes($member)
    {
        return [
            'id'       => $member->id(),
            'name'     => $member->name(),
            'world_id' => $member->world()->id(),
            'user_id'  => $member->user()->id(),
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
        $world = $this->world()->fetchById($eloquent->world_id);
        $user = $this->user()->fetchById($eloquent->user_id);

        $entity = $this->factory->revive($eloquent->id, $eloquent->name, $world, $user);

        return $entity;
    }
}
