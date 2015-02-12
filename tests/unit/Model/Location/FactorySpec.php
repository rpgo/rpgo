<?php

namespace unit\Rpgo\Model\Location;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Location\Location;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Location\Factory');
    }

    function it_makes_a_new_Location_from_name_and_slug()
    {
        $this->make([
            'name' => 'SGC',
            'slug' => 'sgc',
        ])->shouldHaveType('Rpgo\Model\Location\Location');
    }

    function it_sets_the_name_correctly_on_the_newly_made_Location()
    {
        $this->make([
            'name' => 'SGC',
            'slug' => 'sgc',
        ])->name()->shouldBe('SGC');
    }

    function it_sets_the_slug_correctly_on_the_newly_made_Location()
    {
        $this->make([
            'name' => 'SGC',
            'slug' => 'sgc',
        ])->slug()->shouldBe('sgc');
    }

    function it_doesnt_make_a_new_Location_if_the_name_is_missing()
    {
        $this->make(['slug' => 'sgc',])->shouldReturn(false);
    }

    function it_doesnt_make_a_new_Location_if_the_slug_is_missing()
    {
        $this->make(['name' => 'SGC'])->shouldReturn(false);
    }

    function it_makes_a_new_Location_from_name_slug_and_container_Location(Location $container)
    {
        $this->make([
            'name' => 'SGC',
            'slug' => 'sgc',
            'container' => $container,
        ])->shouldHaveType('Rpgo\Model\Location\Location');
    }

    function it_sets_the_container_Location_correctly_on_the_newly_made_Location(Location $container)
    {
        $this->make([
            'name' => 'SGC',
            'slug' => 'sgc',
            'container' => $container,
        ])->container()->shouldBe($container);
    }

    function it_makes_a_new_Location_from_id_name_and_slug()
    {
        $this->make([
            'id' => '5fbb1fe6-f43a-4761-b11d-592d5ca218ca',
            'name' => 'SGC',
            'slug' => 'sgc',
        ])->shouldHaveType('Rpgo\Model\Location\Location');
    }

    function it_sets_the_id_correctly_on_the_newly_made_Location()
    {
        $this->make([
            'id' => '5fbb1fe6-f43a-4761-b11d-592d5ca218ca',
            'name' => 'SGC',
            'slug' => 'sgc',
        ])->id()->shouldBe('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');
    }
}
