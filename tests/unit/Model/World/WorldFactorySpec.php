<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\World\WorldFactory;

class WorldFactorySpec extends ObjectBehavior
{
    function it_adheres_to_the_WorldFactory_contract()
    {
        $this->shouldHaveType(WorldFactory::class);
    }
}
