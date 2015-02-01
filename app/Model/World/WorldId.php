<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\EntityId;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\World\WorldId as WorldIdContract;

class WorldId extends EntityId implements WorldIdContract {

    public function isIdForSameEntity(Id $id)
    {
        return $id instanceof WorldIdContract;
    }
}
