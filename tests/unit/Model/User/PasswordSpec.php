<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\Password;

class PasswordSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('password');
    }

    function it_is_initializable_with_unhashed_password()
    {
        $this->beConstructedWith('password');
        $this->shouldHaveType(Password::class);
    }

    function it_is_initializable_with_hashed_password()
    {
        $this->beConstructedWith('password_hashed', false);
        $this->shouldHaveType(Password::class);
    }

    function it_views_the_righ_password_valid()
    {
        $this->check('password')->shouldReturn(true);
    }

    function it_views_the_wrong_password_invalid()
    {
        $this->check('wrong_password')->shouldReturn(false);
    }
}
