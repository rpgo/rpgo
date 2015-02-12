<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Location\Id;
use Rpgo\Model\Location\Location;
use Rpgo\Model\Location\Name;
use Rpgo\Model\Location\Slug;

class LocationSpec extends ObjectBehavior
{
    function let(Id $id, Name $name, Slug $slug)
    {
        $this->beConstructedWith($id, $name, $slug);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Location');
    }

    function it_returns_the_id_as_a_string(Id $id)
    {
        $id->__toString()->willReturn('id');
        $this->id()->shouldBe('id');
    }

    function it_returns_the_name_as_a_string(Name $name)
    {
        $name->__toString()->willReturn('SGC');
        $this->name()->shouldBe('SGC');
    }

    function it_returns_the_slug_as_a_string(Slug $slug)
    {
        $slug->__toString()->willReturn('sgc');
        $this->slug()->shouldBe('sgc');
    }

    function it_returns_null_if_it_has_no_container()
    {
        $this->container()->shouldBe(null);
    }

    function it_returns_the_container_Location(Id $id, Name $name, Slug $slug, Location $container)
    {
        $this->beConstructedWith($id, $name, $slug, $container);
        $this->container()->shouldBe($container);
    }
}
