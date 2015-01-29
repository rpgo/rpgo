<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\Member\MemberId;

class MemberIdSpec extends ObjectBehavior
{
    function it_adheres_to_the_MemberId_contract()
    {
        $this->shouldHaveType(MemberId::class);
    }
}
