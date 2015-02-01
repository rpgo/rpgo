<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BrandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('SG: Memo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Brand');
    }
}
