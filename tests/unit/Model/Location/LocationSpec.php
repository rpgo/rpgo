<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Location\Id;
use Rpgo\Model\Location\Location;
use Rpgo\Model\Location\Name;
use Rpgo\Model\Location\Slug;
use Rpgo\Support\Collection\Collection;

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

    function it_is_World_if_it_has_no_container()
    {
        $this->isWorld()->shouldReturn(true);
    }

    function it_is_World_if_it_has_a_container(Location $container)
    {
        $this->container($container);
        $this->isWorld()->shouldReturn(false);
    }

    function its_breadcrumbs_contain_only_itself_Name_if_its_World()
    {
        $this->breadcrumbs()->shouldBe([$this]);
    }

    function its_breadcrumbs_contain_the_breadcrumbs_of_the_container_Location(Location $container, Location $other)
    {
        $container->breadcrumbs()->willReturn([$other, $container]);
        $this->container($container);

        $this->breadcrumbs()->shouldBe([$other, $container, $this]);
    }

    function its_path_contains_only_its_Slug_if_its_a_World(Slug $slug)
    {
        $slug->__toString()->willReturn('my-little-place');
        $this->path()->shouldBe(['my-little-place']);
    }

    function its_path_contains_the_path_of_the_container_Location(Location $container, Slug $slug)
    {
        $slug->__toString()->willReturn('my-little-place');
        $container->path()->willReturn(['path','to','container']);
        $this->container($container);

        $this->path()->shouldBe(['path', 'to', 'container', 'my-little-place']);
    }

    function it_has_no_locations_by_default()
    {
        $this->locations()->shouldBe(null);
    }

    function it_can_contain_other_locations(Collection $collection)
    {
        $this->locations($collection);
        $this->locations()->shouldBe($collection);
    }
}
