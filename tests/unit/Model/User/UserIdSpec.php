<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\EntityId;
use Rpgo\Model\Contracts\Id;
use Rpgo\Model\Contracts\User\UserId;

class UserIdSpec extends ObjectBehavior
{
    function let(Id $id)
    {
        $this->beConstructedWith($id);
    }

    function it_adheres_to_the_UserId_contract()
    {
        $this->shouldHaveType(UserId::class);
    }

    function it_extends_the_EntityId_class()
    {
        $this->shouldHaveType(EntityId::class);
    }

    function it_returns_false_when_asked_if_a_general_id_is_for_the_same_entity(Id $otherId)
    {
        $this->shouldNotBeIdForSameEntity($otherId);
    }

    function it_returns_true_when_asked_if_a_UserId_is_for_the_same_entity(UserId $userId)
    {
        $this->shouldBeIdForSameEntity($userId);
    }
}
