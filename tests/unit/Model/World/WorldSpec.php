<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\User;
use Rpgo\Model\World\Trademark;
use Rpgo\Model\World\WorldId;

class WorldSpec extends ObjectBehavior
{
    function let(WorldId $id, Trademark $trademark, User $creator)
    {
        $this->beConstructedWith($id, $trademark, $creator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\World');
    }

    function it_returns_the_id_as_a_string(WorldId $id)
    {
        $id->__toString()->willReturn('id');
        $this->id()->shouldBe('id');
    }

    function it_returns_the_creator_User(User $creator)
    {
        $this->creator()->shouldBe($creator);
    }

    function it_returns_the_name_as_a_string(Trademark $trademark)
    {
        $trademark->name()->willReturn('Stargate Memories');
        $this->name()->shouldBe('Stargate Memories');
    }

    function it_returns_the_brand_as_a_string(Trademark $trademark)
    {
        $trademark->brand()->willReturn('SG: Memo');
        $this->brand()->shouldBe('SG: Memo');
    }

    function it_returns_the_slug_as_a_string(Trademark $trademark)
    {
        $trademark->slug()->willReturn('sg-memo');
        $this->slug()->shouldBe('sg-memo');
    }
}
