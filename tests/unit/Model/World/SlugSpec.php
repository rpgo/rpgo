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
    }

    function it_cannot_contain_a_dot()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['sg.memo']);
    }

    function it_cannot_contain_uppercase_characters()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['SGMEMO']);
    }

    function it_cannot_contain_hungarian_characters()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['áéíóúöüőűÁÉÍÓÚÖÜŐŰ']);
    }

    function it_cannot_contain_an_and_symbol()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['sg&memo']);
    }

    function it_cannot_contain_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['sg@memo']);
    }

    function it_cannot_contain_a_slash()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\InvalidWorldSlugException')
            ->during('__construct', ['sg/memo']);
    }

    function it_is_immutable()
    {
        $this->change('sgmemo')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_username()
    {
        $this->change('sgmemo')->shouldHaveType('Rpgo\Model\World\Slug');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('sgmemo')->__toString()->shouldReturn('sgmemo');
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\EmptyWorldSlugException')
            ->during('__construct', ['']);
    }

    function it_cannot_be_longer_than_20_characters()
    {
        $this->shouldThrow('Rpgo\Model\World\Exception\LongWorldSlugException')
            ->during('__construct', ['sgmemo-sgmemo-sgmemo-sgmemo-']);
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('sg-memo');
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('sgmemo');

        $this->__toString()->shouldReturn('sgmemo');
    }
}
