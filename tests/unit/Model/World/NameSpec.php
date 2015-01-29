<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\World\Name;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Stargate Memories');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Name::class);
    }
}
