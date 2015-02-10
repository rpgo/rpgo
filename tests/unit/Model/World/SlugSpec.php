<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SlugSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('sg-memo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Slug');
        $this->shouldHaveType('Rpgo\Model\Common\Slug');
    }

    function it_cannot_be_longer_than_20_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sgmemo-sgmemo-sgmemo-sgmemo-']);
    }

}
