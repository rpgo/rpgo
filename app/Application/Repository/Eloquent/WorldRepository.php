<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Model\User\UserFactory;
use Rpgo\Model\Member\MemberFactory;
use Rpgo\Model\World\World as Model;
use Rpgo\Application\Repository\Eloquent\World as Eloquent;
use Rpgo\Model\World\WorldFactory;
use Rpgo\Support\Collection\Collection;

class WorldRepository implements WorldRepositoryContract {
    /**
     * @var WorldFactory
     */
    private $factory;
    /**
     * @var UserFactory
     */
    private $user;
    /**
     * @var MemberFactory
     */
    private $member;

    function __construct(WorldFactory $factory, UserFactory $user, MemberFactory $member)
    {
        $this->factory = $factory;
        $this->user = $user;
        $this->member = $member;
    }

    public function save(Model $world)
    {
        $eloquent = Eloquent::findOrNew($world->id());

        $eloquent->id = $world->id();
        $eloquent->name = $world->name();
        $eloquent->slug = $world->slug();
        $eloquent->brand = $world->brand();
        $eloquent->creator_id = $world->creator()->id();

        return $eloquent->save();
    }

    /**
     * @param World $world
     * @return bool
     */
    public function delete(Model $world)
    {
        $eloquent = Eloquent::find($world->id());

        return $eloquent->delete();
    }

    /**
     * @param $id
     * @return World
     */
    public function fetchById($id)
    {
        $eloquent = Eloquent::find($id);
        $creator = $this->user->revive($eloquent->creator->id, $eloquent->creator->name, $eloquent->creator->email, $eloquent->creator->password);
        return $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->brand, $eloquent->slug, $creator);
    }

    /**
     * @return Collection
     */
    public function fetchAll()
    {
        $eloquents = Eloquent::with(['creator', 'members'])->get();

        $worlds = new Collection();

        foreach ($eloquents as $eloquent)
        {
            $creator = $this->user->revive($eloquent->creator->id, $eloquent->creator->name, $eloquent->creator->email, $eloquent->creator->password);

            $world = $this->factory->revive($eloquent->id, $eloquent->name, $eloquent->brand, $eloquent->slug, $creator);

            $this->loadMembersFromEloquentToModel($eloquent, $world);

            $worlds->add($world);
        }

        return $worlds;

    }

    /**
     * @param $eloquent
     * @param $world
     * @return Collection
     */
    private function getMembers($eloquent, $world)
    {
        $members = new Collection();

        foreach ($eloquent->members as $member) {
            $user = $this->user->revive($member->user->id, $member->user->name, $member->user->email, $member->user->password);
            $member = $this->member->revive($member->id, $member->name, $world, $user);
            $members->add($member);
        }

        return $members;
    }

    /**
     * @param $eloquent
     * @param $world
     */
    private function loadMembersFromEloquentToModel($eloquent, $world)
    {
        if ($eloquent->members) {
            $members = $this->getMembers($eloquent, $world);

            $world->members($members);
        }
    }
}
