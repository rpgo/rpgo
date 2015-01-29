<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User;
use Rpgo\Model\Contracts\World;

class WorldSpec extends ObjectBehavior
{
    function let(User $user)
    {
        $this->beConstructedWith($user, 'Stargate Memories', 'sgmemo', 'SG:Memo');
    }

    function it_adheres_to_the_World_contract()
    {
        $this->shouldHaveType(World::class);
    }
}
