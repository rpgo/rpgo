<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Common\EntityId;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\Member\MemberId as MemberIdContract;

class MemberId extends EntityId implements MemberIdContract {

    public function isIdForSameEntity(Id $id)
    {
        return $id instanceof MemberIdContract;
    }
}
