<?php

namespace unit\Rpgo\Application\Repository\Eloquent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Application\Repository\Eloquent\UserRepository');
    }
}
