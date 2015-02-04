<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Model\Member as Eloquent;
use Rpgo\Application\Repository\MemberRepository as MemberRepositoryContract;
use Rpgo\Application\Repository\RepositoryManager;
use Rpgo\Model\Member\Member as Model;
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
     */
    public function __construct(RepositoryManager $manager, MemberFactory $factory)
    {
        $this->factory = $factory;
        parent::__construct($manager);
    }

    public function save(Model $member)
    {
        $eloquent = Eloquent::findOrNew($member->id());

        $eloquent->id = $member->id();
        $eloquent->name = $member->name();
        $eloquent->world_id = $member->world()->id();
        $eloquent->user_id = $member->user()->id();

        return $eloquent->save();
    }

    /**
     * @param Model $member
     * @return bool|null
     */
    public function delete(Model $member)
    {
        $eloquent = Eloquent::find($member->id());

        return $eloquent->delete();
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function fetchById($id)
    {
        $eloquent = Eloquent::find($id);

        if( ! $eloquent)
            return null;

        $world = $this->world()->fetchById($eloquent->world_id);
        $user = $this->user()->fetchById($eloquent->user_id);

        $this->factory->revive($eloquent->id, $eloquent->name, $world, $user);
    }

    /**
     * @param World $world
     * @return Collection
     */
    public function fetchAllForWorld(World $world)
    {
        $eloquents = Eloquent::where('world_id', $world->id())->get();

        $members = new Collection();

        foreach ($eloquents as $eloquent)
        {
            $world = $this->world()->fetchById($eloquent->world_id);
            $user = $this->user()->fetchById($eloquent->user_id);

            $member = $this->factory->revive($eloquent->id, $eloquent->name, $world, $user);

            $members->add($member);
        }

        return $members;
    }
}
