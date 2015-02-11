<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Abydos');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Name');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['']);
    }

    function it_cannot_be_longer_than_40_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['The Best Possible Stargate Memories To Make In This Life']);
    }
}
