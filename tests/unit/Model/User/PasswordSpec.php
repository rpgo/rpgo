<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Support\Hash\Hash;

class PasswordSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('password');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Password');
    }

    function it_can_be_cast_to_string()
    {
        $this->check('password')->shouldReturn(true);;
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('otherpassword');

        $this->check('otherpassword')->shouldReturn(true);
    }

    function it_is_immutable()
    {
        $this->change('newpassword')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_password()
    {
        $this->change('newpassword')->shouldHaveType('Rpgo\Model\User\Password');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('newpassword')->check('newpassword')->shouldReturn(true);
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\PasswordEmptyException')
            ->during('__construct', ['']);
    }
}
