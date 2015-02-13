<?php

namespace unit\Rpgo\Model\World;

use Carbon\Carbon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PublicationSpec extends ObjectBehavior
{
    function let(Carbon $date)
    {
        $this->beConstructedWith($date);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Publication');
        $this->shouldHaveType('Rpgo\Model\Common\Value');
    }

    function it_was_not_published_if_the_date_is_in_the_future(Carbon $date)
    {
        $date->isFuture()->willReturn(true);
        $this->isPublished()->shouldReturn(false);
    }

    function it_was_published_if_the_date_is_in_the_past(Carbon $date)
    {
        $date->isFuture()->willReturn(false);
        $this->isPublished()->shouldReturn(true);
    }

    function it_returns_the_carbon_instance(Carbon $date)
    {
        $this->date()->shouldReturn($date);
    }
}
