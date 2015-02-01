<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\World\WorldIdGenerator as WorldIdGeneratorContract;

class WorldIdGenerator extends EntityIdGenerator implements WorldIdGeneratorContract {

    public function getEntityId(Id $id)
    {
        return new WorldId($id);
    }
}
