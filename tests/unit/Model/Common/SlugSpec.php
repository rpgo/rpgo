<?php

namespace unit\Rpgo\Model\Common;

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
        $this->shouldHaveType('Rpgo\Model\Common\Slug');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_cannot_contain_a_dot()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sg.memo']);
    }

    function it_cannot_contain_uppercase_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['SGMEMO']);
    }

    function it_cannot_contain_hungarian_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['áéíóúöüőűÁÉÍÓÚÖÜŐŰ']);
    }

    function it_cannot_contain_an_and_symbol()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sg&memo']);
    }

    function it_cannot_contain_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sg@memo']);
    }

    function it_cannot_contain_a_slash()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['sg/memo']);
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['']);
    }
}
