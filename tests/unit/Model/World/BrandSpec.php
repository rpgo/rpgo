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
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\EmptyWorldBrandException')
            ->during('__construct', ['']);
    }

    function it_cannot_be_longer_than_10_characters()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\LongWorldBrandException')
            ->during('__construct', ['Stargate Memories']);
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('SG: Memo');
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('SG:Memo');

        $this->__toString()->shouldReturn('SG:Memo');
    }

    function it_is_immutable()
    {
        $this->change('SG:Memo')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_world_slug()
    {
        $this->change('SG:Memo')->shouldHaveType('Rpgo\Model\World\Brand');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('SG:Memo')->__toString()->shouldReturn('SG:Memo');
    }
}
