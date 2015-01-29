<?php namespace Rpgo\Model\User;

use Rpgo\Model\Common\EntityId;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\User\UserId as UserIdContract;

final class UserId extends EntityId implements UserIdContract {

    public function isIdForSameEntity(Id $id)
    {
        return $id instanceof UserIdContract;
    }
}
