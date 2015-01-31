<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Model\World\World;
use Rpgo\Application\Repository\Eloquent\World as Eloquent;

class WorldRepository implements WorldRepositoryContract {

    public function save(World $world)
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
    public function delete(World $world)
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
    }
}
