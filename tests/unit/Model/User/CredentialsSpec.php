<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\Email;
use Rpgo\Model\User\Password;

class CredentialsSpec extends ObjectBehavior
{
    function let(Email $email, Password $password)
    {
        $this->beConstructedWith($email, $password);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Credentials');
    }

    function it_validates_credentials_if_both_are_valid(Email $email, Password $password)
    {
        $email->__toString()->willReturn('tolilybelle@gmail.com');
        $password->check('password')->willReturn(true);

        $this->match('tolilybelle@gmail.com', 'password')->shouldReturn(true);
    }

    function it_invalidates_credentials_if_email_isnt_correct(Email $email, Password $password)
    {
        $email->__toString()->willReturn('tolilybelle@gmail.com');
        $password->check('password')->willReturn(true);

        $this->match('lilybelle@gmail.com', 'password')->shouldReturn(false);
    }

    function it_invalidates_credentials_if_password_isnt_correct(Email $email, Password $password)
    {
        $email->__toString()->willReturn('tolilybelle@gmail.com');
        $password->check('password')->willReturn(false);

        $this->match('tolilybelle@gmail.com', 'password')->shouldReturn(false);
    }

    function it_invalidates_credentials_if_bot_email_and_password_arent_correct(Email $email, Password $password)
    {
        $email->__toString()->willReturn('tolilybelle@gmail.com');
        $password->check('password')->willReturn(false);

        $this->match('lilybelle@gmail.com', 'password')->shouldReturn(false);
    }

    function it_returns_the_email(Email $email)
    {
        $email->__toString()->willReturn('tolilybelle@gmail.com');
        $this->email()->shouldBe('tolilybelle@gmail.com');
    }

    function it_returns_the_password(Password $password)
    {
        $password->__toString()->willReturn('hashed_password');
        $this->password()->shouldBe('hashed_password');
    }
}
