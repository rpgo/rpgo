<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\Credentials;
use Rpgo\Model\User\Name;
use Rpgo\Model\User\UserId;

class UserSpec extends ObjectBehavior
{
    function let(UserId $id, Name $name, Credentials $credentials)
    {
        $this->beConstructedWith($id, $name, $credentials);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\User');
    }

    function it_returns_the_id_as_a_string(UserId $id)
    {
        $id->__toString()->willReturn('uuid');
        $this->id()->shouldReturn('uuid');
    }

    function it_returns_the_name_as_a_string(Name $name)
    {
        $name->__toString()->willReturn('username');
        $this->name()->shouldReturn('username');
    }

    function it_returns_the_email_as_a_string(Credentials $credentials)
    {
        $credentials->email()->willReturn('email');
        $this->email()->shouldReturn('email');
    }

    function it_returns_the_hashed_password_as_a_string(Credentials $credentials)
    {
        $credentials->password()->willReturn('password');
        $this->password()->shouldReturn('password');
    }

    function it_validates_valid_credentials(Credentials $credentials)
    {
        $credentials->match('tolilybelle@gmail.com', 'password')->willReturn(true);
        $this->validateCredentials('tolilybelle@gmail.com', 'password')->shouldReturn(true);
    }

    function it_invalidates_invalid_credentials(Credentials $credentials)
    {
        $credentials->match('tolilybelle@gmail.com', 'password')->willReturn(false);
        $this->validateCredentials('tolilybelle@gmail.com', 'password')->shouldReturn(false);
    }

}
