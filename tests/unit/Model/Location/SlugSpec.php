<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SlugSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('univerzum');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Slug');
        $this->shouldHaveType('Rpgo\Model\Common\Slug');
    }

    function it_cannot_be_longer_than_40_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sgmemo-sgmemo-sgmemo-sgmemo-sgmemo-sgmemo']);
    }
}
