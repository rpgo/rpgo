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
}
