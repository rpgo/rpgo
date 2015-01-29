<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\Name;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Lily Belle');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Name::class);
    }
}
