<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Stargate Memories');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Name');
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\EmptyWorldNameException')
            ->during('__construct', ['']);
    }

    function it_cannot_be_longer_than_40_characters()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\LongWorldNameException')
            ->during('__construct', ['The Best Possible Stargate Memories To Make In This Life']);
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('Stargate Memories');
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('SG Memories');

        $this->__toString()->shouldReturn('SG Memories');
    }

    function it_is_immutable()
    {
        $this->change('SG Memories')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_world_name()
    {
        $this->change('SG Memories')->shouldHaveType('Rpgo\Model\World\Name');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('SG Memories')->__toString()->shouldReturn('SG Memories');
    }
}