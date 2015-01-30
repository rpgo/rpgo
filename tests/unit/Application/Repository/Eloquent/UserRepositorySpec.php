<?php

namespace unit\Rpgo\Application\Repository\Eloquent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Application\Repository\Eloquent\User as Eloquent;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\Contracts\User\User as Model;
use Rpgo\Model\Contracts\User\UserFactory;

class UserRepositorySpec extends ObjectBehavior
{
    function let(UserFactory $factory)
    {
        $this->beConstructedWith($factory);
    }

    function it_adheres_to_the_UserRepository_contract()
    {
        $this->shouldHaveType(UserRepository::class);
    }

    function it_makes_a_model_from_an_eloquent_object(Eloquent $eloquent, UserFactory $factory, Model $model)
    {
        $factory->revive(null, null, null, null)->willReturn($model);

        $this->model($eloquent)->shouldReturn($model);
    }
}
