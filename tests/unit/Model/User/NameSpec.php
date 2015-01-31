<?php

namespace unit\Rpgo\Model\User;

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
        $this->shouldHaveType('Rpgo\Model\User\Name');
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('LilyBelle');
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('JohnDoe');

        $this->__toString()->shouldReturn('JohnDoe');
    }

    function it_squawks_at_more_than_30_characters()
    {
        $this->shouldThrow('Rpgo\Support\Exception\UserNameTooLongException')
            ->during('__construct', ['TooLongANameToGiveToAUserHereNow']);
    }

    function it_cannot_contain_a_dot()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This.isreallykillingme']);
    }

    function it_cannot_contain_a_space()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This isreallykillingme']);
    }

    function it_cannot_contain_a_dash()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This-isreallykillingme']);
    }

    function it_cannot_contain_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This@isreallykillingme']);
    }

    function it_cannot_contain_an_and_symbol()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This&isreallykillingme']);
    }

    function it_cannot_contain_a_hashtag()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This#isreallykillingme']);
    }

    function it_cannot_contain_a_quote()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This"isreallykillingme']);
    }

    function it_cannot_contain_a_star()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This*isreallykillingme']);
    }

    function it_cannot_contain_a_plus_sign()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This+isreallykillingme']);
    }

    function it_cannot_contain_a_slash()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
            ->during('__construct', ['This/isreallykillingme']);
    }

    function it_cannot_contain_a_blackslash()
    {
        $this->shouldThrow('Rpgo\Support\Exception\InvalidCharacterInUserNameException')
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

    function it_is_immutable()
    {
        $this->change('JohnDoe')->shouldNotBe($this);
    }

    function it_morphs_into_a_username()
    {
        $this->change('JohnDoe')->shouldHaveType($this);
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('JohnDoe')->__toString()->shouldReturn('JohnDoe');
    }


}
