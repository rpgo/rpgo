<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;
use Rpgo\Model\World\Brand;
use Rpgo\Model\World\Name;
use Rpgo\Model\World\Slug;

class WorldSpec extends ObjectBehavior
{
    function let(User $user, Name $name, Slug $slug, Brand $brand)
    {
        $this->beConstructedWith($user, $name, $slug, $brand);
    }

    function it_adheres_to_the_World_contract()
    {
        $this->shouldHaveType(World::class);
    }
}
