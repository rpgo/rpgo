<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\World\WorldId;

class WorldIdSpec extends ObjectBehavior
{
    function it_adheres_to_the_WorldId_contract()
    {
        $this->shouldHaveType(WorldId::class);
    }
}
