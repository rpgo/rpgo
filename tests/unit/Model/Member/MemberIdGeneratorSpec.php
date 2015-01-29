<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\Member\MemberIdGenerator;

class MemberIdGeneratorSpec extends ObjectBehavior
{
    function it_adheres_to_the_MemberIdGenerator_contract()
    {
        $this->shouldHaveType(MemberIdGenerator::class);
    }
}
