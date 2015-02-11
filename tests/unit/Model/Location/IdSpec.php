<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Id');
        $this->shouldHaveType('Rpgo\Model\Common\Uuid');
    }
}
