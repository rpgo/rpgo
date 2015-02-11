<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\User;
use Rpgo\Model\World\WorldId;
use Rpgo\Model\World\WorldIdGenerator;

class WorldFactorySpec extends ObjectBehavior
{
    function let(WorldIdGenerator $generator, WorldId $id)
    {
        $this->beConstructedWith($generator);
        $generator->generateNewId()->willReturn($id);
        $generator->idFromString('id')->willReturn($id);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\World\WorldFactory');
    }

    function it_creates_a_new_World_from_the_name_brand_slug_and_creator(User $user)
    {
        $this->create('Stargate Memories', 'SG:Memo', 'sgmemo', $user)->shouldHaveType('Rpgo\Model\World\World');
    }

    function it_sets_the_name_correctly_on_the_newly_created_World(User $user)
    {
        $this->create('Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->name()->shouldBe('Stargate Memories');
    }

    function it_sets_the_brand_correctly_on_the_newly_created_World(User $user)
    {
        $this->create('Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->brand()->shouldBe('SG:Memo');
    }

    function it_sets_the_slug_correctly_on_the_newly_created_World(User $user)
    {
        $this->create('Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->slug()->shouldBe('sgmemo');
    }

    function it_sets_the_creator_correctly_on_the_newly_created_World(User $user)
    {
        $this->create('Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->creator()->shouldBe($user);
    }

    function it_revives_an_old_World_from_the_id_name_brand_slug_and_creator(User $user)
    {
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)->shouldHaveType('Rpgo\Model\World\World');
    }

    function it_sets_the_id_correctly_on_the_revived_old_World(User $user, WorldId $id)
    {
        $id->__toString()->willReturn('id');
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->id()->shouldBe('id');
    }

    function it_sets_the_name_correctly_on_the_revived_old_World(User $user)
    {
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->name()->shouldBe('Stargate Memories');
    }

    function it_sets_the_brand_correctly_on_the_revived_old_World(User $user)
    {
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->brand()->shouldBe('SG:Memo');
    }

    function it_sets_the_slug_correctly_on_the_revived_old_World(User $user)
    {
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->slug()->shouldBe('sgmemo');
    }

    function it_sets_the_creator_correctly_on_the_revived_old_World(User $user)
    {
        $this->revive('id', 'Stargate Memories', 'SG:Memo', 'sgmemo', $user)
            ->creator()->shouldBe($user);
    }

}
