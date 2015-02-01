<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Member\MemberId;
use Rpgo\Model\Member\Name;
use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class MemberSpec extends ObjectBehavior
{
    function let(MemberId $id, User $user, World $world, Name $name)
    {
        $this->beConstructedWith($id, $user, $world, $name);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\Member');
    }

    function it_returns_the_name_as_a_string(Name $name)
    {
        $name->__toString()->willReturn('LilyBelle');
        $this->name()->shouldBe('LilyBelle');
    }

    function it_returns_the_User_who_has_the_membership(User $user)
    {
        $this->user()->shouldBe($user);
    }

    function it_returns_the_World_in_which_the_membership_is(World $world)
    {
        $this->world()->shouldBe($world);
    }

    function it_returns_the_id_as_a_string(MemberId $id)
    {
        $id->__toString()->willReturn('id');
        $this->id()->shouldBe('id');
    }
}
