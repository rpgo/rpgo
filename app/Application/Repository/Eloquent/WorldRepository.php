<?php namespace Rpgo\Application\Repository\Eloquent;

use Rpgo\Application\Repository\WorldRepository as WorldRepositoryContract;
use Rpgo\Model\Contracts\World\World;
use Rpgo\Application\Repository\Eloquent\World as Eloquent;

class WorldRepository implements WorldRepositoryContract {

    public function save(World $world)
    {
        return true;
    }
}
