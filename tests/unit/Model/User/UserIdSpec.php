<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\UserId;

class UserIdSpec extends ObjectBehavior
{
    function it_adheres_to_the_UserId_contract()
    {
        $this->shouldHaveType(UserId::class);
    }
}
