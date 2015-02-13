<?php

namespace unit\Rpgo\Model\Member;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('LilyBelle');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Member\Name');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_squawks_at_more_than_30_characters()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['TooLongANameToGiveToAMemberHereNow']);
    }

    function it_cannot_contain_a_dot()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This.isreallykillingme']);
    }

    function it_cannot_contain_a_space()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This isreallykillingme']);
    }

    function it_cannot_contain_a_dash()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This-isreallykillingme']);
    }

    function it_cannot_contain_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This@isreallykillingme']);
    }

    function it_cannot_contain_an_and_symbol()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This&isreallykillingme']);
    }

    function it_cannot_contain_a_hashtag()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This#isreallykillingme']);
    }

    function it_cannot_contain_a_quote()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This"isreallykillingme']);
    }

    function it_cannot_contain_a_star()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This*isreallykillingme']);
    }

    function it_cannot_contain_a_plus_sign()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This+isreallykillingme']);
    }

    function it_cannot_contain_a_slash()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This/isreallykillingme']);
    }

    function it_cannot_contain_a_blackslash()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['This\\isreallykillingme']);
    }

    function it_can_contain_hungarian_letters()
    {
        $this->beConstructedWith('áéíóöőúűÁÉÍÓÖŐÚŰ');

        $this->__toString()->shouldReturn('áéíóöőúűÁÉÍÓÖŐÚŰ');
    }

    function it_can_contain_numbers()
    {
        $this->beConstructedWith('NumbersAreOK0123456789');

        $this->__toString()->shouldReturn('NumbersAreOK0123456789');
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\Exception\InvalidValueException')
            ->during('__construct', ['']);
    }
}
