<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\Member\Member;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;
use Rpgo\Model\Member\Name;

class MemberSpec extends ObjectBehavior
{
    function let(User $user, World $world, Name $name)
    {
        $this->beConstructedWith($user, $world, $name);
    }

    function it_adheres_to_the_Member_contract()
    {
        $this->shouldHaveType(Member::class);
    }
}
