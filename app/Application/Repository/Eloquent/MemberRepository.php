<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\Eloquent\Member as Eloquent;
use Rpgo\Application\Repository\MemberRepository as MemberRepositoryContract;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\Member\Member as Model;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

class MemberRepository implements MemberRepositoryContract {

    /**
     * @var MemberFactory
     */
    private $factory;
    /**
     * @var WorldRepository
     */
    private $world;
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(MemberFactory $factory, WorldRepository $world, UserRepository $user)
    {

        $this->factory = $factory;
        $this->world = $world;
        $this->user = $user;
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

    public function delete(Model $member)
    {
        $eloquent = Eloquent::find($member->id());

        return $eloquent->delete();
    }

    /**
     * @param $id
     * @return Member
     */
    public function fetchById($id)
    {
        // TODO: Implement fetchById() method.
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
            $user = $this->user->fetchById($eloquent->user_id);
            $world = $this->world->fetchById($eloquent->world_id);
            $member = $this->factory->revive($eloquent->id, $eloquent->name, $world, $user);
            $members->add($member);
        }

        return $members;
    }
}
