<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Member\MemberId;
use Rpgo\Model\Member\MemberIdGenerator;
use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class FactorySpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\Factory');
        $this->shouldHaveType('Rpgo\Model\Common\Factory');
    }

    function it_makes_a_Member_from_name_World_and_User(World $world, User $user)
    {
        $this->make([
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->shouldHaveType('Rpgo\Model\Member\Member');
    }

    function it_sets_the_correct_name_on_the_made_Member(World $world, User $user)
    {
        $this->make([
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->name()->shouldBe('LNR');
    }

    function it_sets_the_correct_user_on_the_made_Member(World $world, User $user)
    {
        $this->make([
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->user()->shouldBe($user);
    }

    function it_sets_the_correct_world_on_the_made_Member(World $world, User $user)
    {
        $this->make([
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->world()->shouldBe($world);
    }

    function it_makes_a_Member_from_the_id_name_user_and_world(World $world, User $user)
    {
        $this->make([
            'id' => '43897ce4-8c8f-4766-a7a1-9a634980c3ea',
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->shouldHaveType('Rpgo\Model\Member\Member');
    }

    function it_sets_the_correct_id_on_the_made_Member(World $world, User $user)
    {
        $this->make([
            'id' => '43897ce4-8c8f-4766-a7a1-9a634980c3ea',
            'name' => 'LNR',
            'world' => $world,
            'user' => $user,
        ])->id()->shouldBe('43897ce4-8c8f-4766-a7a1-9a634980c3ea');
    }

    function it_does_not_make_a_Member_if_the_name_is_missing(World $world, User $user)
    {
        $this->make([
            'world' => $world,
            'user' => $user,
        ])->shouldReturn(null);
    }

    function it_does_not_make_a_Member_if_the_user_is_missing(World $world)
    {
        $this->make([
            'name' => 'LNR',
            'world' => $world,
        ])->shouldReturn(null);
    }

    function it_does_not_make_a_Member_if_the_world_is_missing(User $user)
    {
        $this->make([
            'name' => 'LNR',
            'user' => $user,
        ])->shouldReturn(null);
    }
}
