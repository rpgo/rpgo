<?php

namespace unit\Rpgo\Support\Guard;

use Illuminate\Auth\Guard as IlluminateGuard;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Application\Repository\UserRepository;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Support\Contracts\Guard\Guard;

class GuardSpec extends ObjectBehavior
{
    function let(IlluminateGuard $guard, UserRepository $repository)
    {
        $this->beConstructedWith($guard, $repository);
    }

    function it_adheres_to_the_Guard_contract()
    {
        $this->shouldHaveType(Guard::class);
    }

    function it_has_no_logged_in_User_at_the_start()
    {
        $this->user()->shouldBe(null);
    }

    function it_logs_in_a_User(User $user, IlluminateGuard $guard)
    {
        $user->id()->willReturn('user id');
        $guard->loginUsingId('user id')->shouldBeCalled();

        $this->vouch($user);
    }

    function it_validates_correct_credentials(IlluminateGuard $guard)
    {
        $guard->validate(['email' => 'tolilybelle@gmail.com', 'password' => '12345'])->willReturn(true);

        $this->check('tolilybelle@gmail.com', '12345')->shouldReturn(true);
    }

    function it_invalidates_incorrect_credentials(IlluminateGuard $guard)
    {
        $guard->validate(['email' => 'tolilybelle@gmail.com', 'password' => '12345'])->willReturn(false);

        $this->check('tolilybelle@gmail.com', '12345')->shouldReturn(false);
    }
}
