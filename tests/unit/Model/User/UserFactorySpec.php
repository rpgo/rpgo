<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\UserFactory;

class UserFactorySpec extends ObjectBehavior
{
    function it_adheres_to_the_UserFactory_contract()
    {
        $this->shouldHaveType(UserFactory::class);
    }
}
