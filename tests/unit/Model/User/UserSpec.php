<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\User\UserId;
use Rpgo\Model\User\Email;
use Rpgo\Model\User\Name;
use Rpgo\Model\User\Password;

class UserSpec extends ObjectBehavior
{
    function let(UserId $userId, Name $name, Email $email, Password $password)
    {
        $this->beConstructedWith($userId, $name, $email, $password);
    }

    function it_adheres_to_the_User_contract()
    {
        $this->shouldHaveType(User::class);
    }
}
