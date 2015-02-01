<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Stargate Memories');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Name');
    }
}
