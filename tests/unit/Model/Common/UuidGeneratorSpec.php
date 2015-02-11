<?php

namespace unit\Rpgo\Model\Common;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UuidGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Common\UuidGenerator');
        $this->shouldHaveType('Rpgo\Model\Contracts\IdGenerator');
    }

    function it_generates_a_new_uuid()
    {
        $this->generateNewId()->shouldHaveType('Rpgo\Model\Common\Uuid');
    }

    function it_returns_a_uuid_from_string()
    {
        $this->idFromString('5fbb1fe6-f43a-4761-b11d-592d5ca218ca')->shouldHaveType('Rpgo\Model\Common\Uuid');
    }

    function it_returns_the_correct_uuid_from_string()
    {
        $id = $this->idFromString('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');

        $id->__toString()->shouldReturn('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');
    }
}
