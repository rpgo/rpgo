<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\Member\MemberIdGenerator as MemberIdGeneratorContract;

class MemberIdGenerator extends EntityIdGenerator implements MemberIdGeneratorContract {

    public function getEntityId(Id $id)
    {
        return new MemberId($id);
    }
}
