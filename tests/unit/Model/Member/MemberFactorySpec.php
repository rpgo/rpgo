<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\Member\MemberFactory;

class MemberFactorySpec extends ObjectBehavior
{
    function it_adheres_to_the_MemberFactory_contract()
    {
        $this->shouldHaveType(MemberFactory::class);
    }
}
