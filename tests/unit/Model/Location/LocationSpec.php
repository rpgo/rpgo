<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\Uuid;
use Rpgo\Model\Location\Name;
use Rpgo\Model\Location\Slug;

class LocationSpec extends ObjectBehavior
{
    function let(Uuid $id, Name $name, Slug $slug)
    {
        $this->beConstructedWith($id, $name, $slug);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Location');
    }
}
