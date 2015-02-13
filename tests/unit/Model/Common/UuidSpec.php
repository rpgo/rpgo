<?php

namespace unit\Rpgo\Model\Common;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\Id;

class UuidSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Common\Uuid');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
        $this->shouldHaveType('Rpgo\Model\Common\Id');
    }

    function it_is_identical_to_the_same_uuid()
    {
        $other = $this->changeValueTo('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');

        $this->isIdenticalTo($other)->shouldReturn(true);
    }

    function it_is_not_identical_to_a_different_uuid()
    {
        $other = $this->changeValueTo('67703b92-8705-4e01-9dd5-288a32ac8b63');

        $this->isIdenticalTo($other)->shouldReturn(false);
    }

    function it_is_not_identical_to_a_different_identifier(Id $other)
    {
        $this->isIdenticalTo($other)->shouldReturn(false);
    }
}
