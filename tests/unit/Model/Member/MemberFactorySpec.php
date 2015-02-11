<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Member\MemberId;
use Rpgo\Model\Member\MemberIdGenerator;
use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class MemberFactorySpec extends ObjectBehavior
{
    function let(MemberIdGenerator $generator, MemberId $id)
    {
        $this->beConstructedWith($generator);

        $generator->generateNewId()->willReturn($id);
        $generator->idFromString('id')->willReturn($id);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\MemberFactory');
    }

    function it_creates_a_new_Member_name_World_and_User(World $world, User $user)
    {
        $this->create('LilyBelle', $world, $user)->shouldHaveType('Rpgo\Model\Member\Member');
    }

    function it_sets_the_name_correctly_on_the_newly_created_Member(World $world, User $user)
    {
        $this->create('LilyBelle', $world, $user)
            ->name()->shouldBe('LilyBelle');
    }

    function it_sets_the_User_correctly_on_the_newly_created_Member(World $world, User $user)
    {
        $this->create('LilyBelle', $world, $user)
            ->user()->shouldBe($user);
    }

    function it_sets_the_World_correctly_on_the_newly_created_Member(World $world, User $user)
    {
        $this->create('LilyBelle', $world, $user)
            ->world()->shouldBe($world);
    }

    function it_revives_an_old_Member_from_the_id_name_World_and_User(World $world, User $user)
    {
        $this->revive('id', 'LilyBelle', $world, $user)->shouldHaveType('Rpgo\Model\Member\Member');
    }

    function it_sets_the_name_correctly_on_the_revived_old_Member(World $world, User $user)
    {
        $this->revive('id', 'LilyBelle', $world, $user)
            ->name()->shouldBe('LilyBelle');
    }

    function it_sets_the_User_correctly_on_the_revived_old_Member(World $world, User $user)
    {
        $this->revive('id', 'LilyBelle', $world, $user)
            ->user()->shouldBe($user);
    }

    function it_sets_the_World_correctly_on_the_revived_old_Member(World $world, User $user)
    {
        $this->revive('id', 'LilyBelle', $world, $user)
            ->world()->shouldBe($world);
    }
}
