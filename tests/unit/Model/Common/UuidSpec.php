<?php

namespace unit\Rpgo\Model\Common;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UuidSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Common\Uuid');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
        $this->shouldHaveType('Rpgo\Model\Contracts\Id');
    }
}
