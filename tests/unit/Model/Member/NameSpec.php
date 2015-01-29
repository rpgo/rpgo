<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Member\Name;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('LNR');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Name::class);
    }
}
