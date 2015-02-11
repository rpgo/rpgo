<?php

namespace unit\Rpgo\Model\Common;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Common\Value;

class ValueSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('value');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('value');
    }

    function it_casts_itself_to_string()
    {
        $this->beConstructedWith('other value');

        $this->__toString()->shouldReturn('other value');
    }

    function it_is_immutable()
    {
        $this->changeValueTo('new value')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_world_name()
    {
        $this->changeValueTo('new value')->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->changeValueTo('new value')->__toString()->shouldReturn('new value');
    }

    function it_equals_itself()
    {
        $this->isEqualTo($this)->shouldReturn(true);
    }

    function it_equals_another_value_object_with_the_same_value()
    {
        $other = $this->changeValueTo('value');

        $this->isEqualTo($other)->shouldReturn(true);
    }

    function it_does_not_equal_another_value_object_with_a_different_value()
    {
        $other = $this->changeValueTo('other value');

        $this->isEqualTo($other)->shouldReturn(false);
    }
}
