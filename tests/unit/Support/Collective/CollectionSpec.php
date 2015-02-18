<?php

namespace unit\Rpgo\Support\Collective;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Support\Collective\Collection');
        $this->shouldHaveType('Rpgo\Support\Collective\Contract\Collection');
    }

    function it_counts_zero_items_at_start_because_it_is_empty_by_default()
    {
        $this->count()->shouldBe(0);
    }

    function it_counts_one_item_after_an_item_has_been_added()
    {
        $this->add('something');
        $this->count()->shouldBe(1);
    }

    function it_contains_the_item_after_it_has_been_added()
    {
        $this->add('something');
        $this->contains('something')->shouldReturn(true);
    }

    function it_does_not_contain_an_item_that_has_not_been_added()
    {
        $this->contains('something')->shouldReturn(false);
    }

    function it_is_empty_at_first()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    function it_is_not_empty_after_an_element_has_been_added()
    {
        $this->add('something');
        $this->isEmpty()->shouldReturn(false);
    }
}
