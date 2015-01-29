<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\EntityIdGenerator;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\IdGenerator;
use Rpgo\Model\Contracts\User\UserId;
use Rpgo\Model\Contracts\User\UserIdGenerator;

class UserIdGeneratorSpec extends ObjectBehavior
{
    function let(IdGenerator $generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_adheres_to_the_UserIdGenerator_contract()
    {
        $this->shouldHaveType(UserIdGenerator::class);
    }

    function it_extends_the_EntityIdGenerator_class()
    {
        $this->shouldHaveType(EntityIdGenerator::class);
    }

    function it_returns_a_UserId_for_a_general_id(Id $id)
    {
        $this->getEntityId($id)->shouldHaveType(UserId::class);
    }
}
