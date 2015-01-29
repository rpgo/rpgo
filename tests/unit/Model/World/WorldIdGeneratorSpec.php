<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\IdGenerator;
use Rpgo\Model\Contracts\World\WorldId;
use Rpgo\Model\Contracts\World\WorldIdGenerator;

class WorldIdGeneratorSpec extends ObjectBehavior
{
    function let(IdGenerator $generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_adheres_to_the_WorldIdGenerator_contract()
    {
        $this->shouldHaveType(WorldIdGenerator::class);
    }

    function it_extends_the_EntityIdGenerator_class()
    {
        $this->shouldHaveType(EntityIdGenerator::class);
    }

    function it_returns_a_MemberId_for_a_general_id(Id $id)
    {
        $this->getEntityId($id)->shouldHaveType(WorldId::class);
    }
}
