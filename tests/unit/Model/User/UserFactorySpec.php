<?php

namespace unit\Rpgo\Model\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\User\UserFactory;
use Rpgo\Model\Contracts\User\UserId;
use Rpgo\Model\Contracts\User\UserIdGenerator;

class UserFactorySpec extends ObjectBehavior
{
    function let(UserIdGenerator $generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_adheres_to_the_UserFactory_contract()
    {
        $this->shouldHaveType(UserFactory::class);
    }

    function it_creates_a_User_from_raw_input(UserIdGenerator $generator, UserId $id)
    {
        $generator->next()->willReturn($id);

        $this->createFromRaw('LilyBelle', 'tolilybelle@gmail.com', '123456') ->shouldHaveType(User::class);
    }
}
