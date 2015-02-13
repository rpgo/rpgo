<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\Id');
        $this->shouldHaveType('Rpgo\Model\Common\Uuid');
    }
}
