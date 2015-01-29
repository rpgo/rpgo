<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\IdGenerator;
use Rpgo\Model\Contracts\Member\MemberId;
use Rpgo\Model\Contracts\Member\MemberIdGenerator;

class MemberIdGeneratorSpec extends ObjectBehavior
{
    function let(IdGenerator $generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_adheres_to_the_MemberIdGenerator_contract()
    {
        $this->shouldHaveType(MemberIdGenerator::class);
    }

    function it_extends_the_EntityIdGenerator_class()
    {
        $this->shouldHaveType(EntityIdGenerator::class);
    }

    function it_returns_a_MemberId_for_a_general_id(Id $id)
    {
        $this->getEntityId($id)->shouldHaveType(MemberId::class);
    }
}
