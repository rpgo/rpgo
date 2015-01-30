<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\Member\Member;
use Rpgo\Model\Contracts\Member\MemberFactory;
use Rpgo\Model\Contracts\Member\MemberId;
use Rpgo\Model\Contracts\Member\MemberIdGenerator;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;

class MemberFactorySpec extends ObjectBehavior
{
    function let(MemberIdGenerator $generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_adheres_to_the_MemberFactory_contract()
    {
        $this->shouldHaveType(MemberFactory::class);
    }

    function it_creates_a_new_Member(MemberIdGenerator $generator, MemberId $id, World $world, User $user)
    {
        $generator->next()->willReturn($id);

        $this->create($world, $user, 'LNR')->shouldHaveType(Member::class);
    }

    function it_revives_an_old_User(MemberIdGenerator $generator, MemberId $id, World $world, User $user)
    {
        $generator->from('id')->willReturn($id);

        $this->revive('id', $world, $user, 'LNR')->shouldHaveType(Member::class);
    }
}
