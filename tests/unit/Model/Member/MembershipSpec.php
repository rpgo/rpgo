<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class MembershipSpec extends ObjectBehavior
{
    function let(World $world, User $user)
    {
        $this->beConstructedWith($world, $user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\Membership');
    }

    function it_returns_the_User_who_has_the_membership(User $user)
    {
        $this->user()->shouldBe($user);
    }

    function it_returns_the_World_in_which_the_membership_is(World $world)
    {
        $this->world()->shouldBe($world);
    }
}
