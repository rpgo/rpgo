<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\Email;

class EmailSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('tolilybelle@gmail.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Email::class);
    }
}
