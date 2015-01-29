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

    function it_is_initializable()
    {
        $this->shouldHaveType(Password::class);
    }
}
