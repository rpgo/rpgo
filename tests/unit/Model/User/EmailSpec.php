<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('tolilybelle@gmail.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Email');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_needs_to_have_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['tolilybellegmail.com']);
    }


    function it_needs_to_have_a_dot_after_the_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['tolilybelle@gmailcom']);
    }

    function it_cannot_contain_a_dash()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['to-lilybellegmail.com']);
    }

    function it_cannot_contain_a_space()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['tolily bellegmail.com']);
    }

    function it_cannot_start_with_an_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['@tolilybellegmail.com']);
    }

    function it_cannot_have_more_than_one_at_symbol()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\InvalidEmailException')
            ->during('__construct', ['tolily@belle@gmail.com']);
    }

    function it_returns_the_handle()
    {
        $this->handle()->shouldBe('tolilybelle');
    }

    function it_returns_the_correct_handle()
    {
        $this->beConstructedWith('john@doe.sg');
        $this->handle()->shouldBe('john');
    }

    function it_returns_the_domain()
    {
        $this->domain()->shouldBe('gmail.com');
    }

    function it_returns_the_correct_domain()
    {
        $this->beConstructedWith('john@doe.sg');
        $this->domain()->shouldBe('doe.sg');
    }

}
