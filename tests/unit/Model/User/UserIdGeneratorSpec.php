<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\UserIdGenerator;

class UserIdGeneratorSpec extends ObjectBehavior
{
    function it_adheres_to_the_UserIdGenerator_contract()
    {
        $this->shouldHaveType(UserIdGenerator::class);
    }
}
