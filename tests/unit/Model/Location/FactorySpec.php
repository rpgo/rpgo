<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Factory');
    }
}
