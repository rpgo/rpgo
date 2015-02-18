<?php

namespace unit\Rpgo\Support\Collective;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PipeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Support\Collective\Pipe');
        $this->shouldHaveType('Rpgo\Support\Collective\Contract\Pipe');
    }

    function it_gets_the_item_that_was_put_in_if_it_has_only_one_items()
    {
        $this->put('single item');
        $this->get()->shouldReturn('single item');
    }

    function it_gets_the_items_in_reverse_order_after_two_items_have_been_put_into_it()
    {
        $this->put('first');
        $this->put('second');
        $this->get()->shouldReturn('first');
        $this->get()->shouldReturn('second');
    }

    function it_gets_the_items_in_reverse_order_after_three_items_have_been_put_into_it()
    {
        $this->put('first');
        $this->put('second');
        $this->put('third');
        $this->get()->shouldReturn('first');
        $this->get()->shouldReturn('second');
        $this->get()->shouldReturn('third');
    }

    function it_returns_null_when_trying_to_get_an_item_out_of_it_and_is_empty()
    {
        $this->get()->shouldReturn(null);
    }

    function it_clears_out_the_pipe()
    {
        $this->put('first');
        $this->clear();
        $this->get()->shouldReturn(null);
    }

    function it_dumps_out_the_items_and_clears_itself_in_the_process()
    {
        $this->put('first');
        $this->dump()->shouldReturn(['first']);
        $this->dump()->shouldReturn([]);
    }

    function it_loops_through_the_items_and_returns_those_and_clears_itself()
    {
        $this->put(1);
        $this->put(2);
        $this->each(function($item){return $item * 2;})->shouldReturn([2,4]);
        $this->dump()->shouldReturn([]);
    }
}
