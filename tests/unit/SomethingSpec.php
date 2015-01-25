<?php

namespace unit\Rpgo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SomethingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Something');
    }
}
