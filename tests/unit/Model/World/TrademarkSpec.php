<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\World\Brand;
use Rpgo\Model\World\Name;
use Rpgo\Model\World\Slug;

class TrademarkSpec extends ObjectBehavior
{
    function let(Name $name, Brand $brand, Slug $slug)
    {
        $this->beConstructedWith($name, $brand, $slug);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Trademark');
    }

    function it_returns_the_name_as_a_string(Name $name)
    {
        $name->__toString()->willReturn('Stargate Memories');
        $this->name()->shouldBe('Stargate Memories');
    }

    function it_returns_the_brand_as_a_string(Brand $brand)
    {
        $brand->__toString()->willReturn('SG: Memo');
        $this->brand()->shouldBe('SG: Memo');
    }

    function it_returns_the_slug_as_a_string(Slug $slug)
    {
        $slug->__toString()->willReturn('sg-memo');
        $this->slug()->shouldBe('sg-memo');
    }
}
