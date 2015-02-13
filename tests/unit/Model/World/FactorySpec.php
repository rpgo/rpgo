<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Location\Location;
use Rpgo\Model\User\User;

class FactorySpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\Factory');
    }

    function it_makes_a_World_from_the_name_brand_slug_and_creator(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->shouldHaveType('Rpgo\Model\World\World');
    }

    function it_sets_the_name_correctly_on_the_made_World(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->name()->shouldBe('Stargate Memories');
    }

    function it_sets_the_brand_correctly_on_the_made_World(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->brand()->shouldBe('SG:Memo');
    }

    function it_sets_the_slug_correctly_on_the_made_World(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->slug()->shouldBe('sgmemo');
    }

    function it_sets_the_creator_correctly_on_the_made_World(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->creator()->shouldBe($creator);
    }

    function it_makes_a_World_from_the_id_name_brand_slug_and_creator(User $creator)
    {
        $this->make([
            'id' => '5fbb1fe6-f43a-4761-b11d-592d5ca218ca',
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->shouldHaveType('Rpgo\Model\World\World');
    }

    function it_sets_the_id_correctly_on_the_made_World(User $creator)
    {
        $this->make([
            'id' => '5fbb1fe6-f43a-4761-b11d-592d5ca218ca',
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->id()->shouldBe('5fbb1fe6-f43a-4761-b11d-592d5ca218ca');
    }

    function it_does_not_make_a_World_if_the_name_is_missing(User $creator)
    {
        $this->make([
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->shouldReturn(null);
    }

    function it_does_not_make_a_World_if_the_brand_is_missing(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'slug' => 'sgmemo',
            'creator' => $creator,
        ])->shouldReturn(null);
    }

    function it_does_not_make_a_World_if_the_slug_is_missing(User $creator)
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'creator' => $creator,
        ])->shouldReturn(null);
    }


    function it_does_not_make_a_World_if_the_creator_is_missing()
    {
        $this->make([
            'name' => 'Stargate Memories',
            'brand' => 'SG:Memo',
            'slug' => 'sgmemo',
        ])->shouldReturn(null);
    }

}
