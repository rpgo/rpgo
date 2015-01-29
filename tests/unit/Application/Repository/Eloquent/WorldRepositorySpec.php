<?php

namespace unit\Rpgo\Application\Repository\Eloquent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Application\Repository\WorldRepository;

class WorldRepositorySpec extends ObjectBehavior
{
    function it_adheres_to_the_WorldRepository_contract()
    {
        $this->shouldHaveType(WorldRepository::class);
    }
}
