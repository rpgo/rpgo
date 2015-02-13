<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BrandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('SG: Memo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Brand');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['']);
    }

    function it_cannot_be_longer_than_10_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['SG Memories']);
    }

}
