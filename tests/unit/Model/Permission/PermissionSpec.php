<?php

namespace unit\Rpgo\Model\Permission;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PermissionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Permission\Permission');
    }
}
