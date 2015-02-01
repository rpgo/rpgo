<?php namespace Rpgo\Model\User;

use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\User\UserIdGenerator as UserIdGeneratorContract;

class UserIdGenerator extends EntityIdGenerator implements UserIdGeneratorContract {

    public function getEntityId(Id $id)
    {
        return new UserId($id);
    }
}
