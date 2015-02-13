<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Id');
        $this->shouldHaveType('Rpgo\Model\Common\Uuid');
    }
}
