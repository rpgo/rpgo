<?php

namespace unit\Rpgo\Model\User;

use Illuminate\Hashing\BcryptHasher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\User\UserId;
use Rpgo\Model\User\UserIdGenerator;
use Rpgo\Support\Hash\Hash;

class FactorySpec extends ObjectBehavior
{
    function let(BcryptHasher $hasher)
    {
        $this->beConstructedWith($hasher);

        $hasher->make('password')->willReturn('hashed_password');
        $hasher->check('password', 'hashed_password')->willReturn(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Factory');
    }

    function it_creates_a_new_User_from_name_email_and_password()
    {
        $this->create('LilyBelle', 'tolilybelle@gmail.com', 'password')->shouldHaveType('Rpgo\Model\User\User');
    }

    function it_sets_the_name_correctly_on_the_newly_created_User()
    {
        $this->create('LilyBelle', 'tolilybelle@gmail.com', 'password')
            ->name()->shouldReturn('LilyBelle');
    }

    function it_sets_the_email_correctly_on_the_newly_created_User()
    {
        $this->create('LilyBelle', 'tolilybelle@gmail.com', 'password')
            ->email()->shouldReturn('tolilybelle@gmail.com');
    }

    function it_sets_the_password_correctly_on_the_newly_created_User()
    {
        $this->create('LilyBelle', 'tolilybelle@gmail.com', 'password')
            ->validateCredentials('tolilybelle@gmail.com','password')->shouldReturn(true);
    }

    function it_revives_an_old_User_from_the_id_name_email_and_password()
    {
        $this->revive('0b2e8b80-f13d-43c2-851f-e06b25f8aa0a', 'LilyBelle', 'tolilybelle@gmail.com', 'hashed_password')->shouldHaveType('Rpgo\Model\User\User');
    }

    function it_sets_the_name_correctly_on_the_revived_old_User()
    {
        $this->revive('0b2e8b80-f13d-43c2-851f-e06b25f8aa0a', 'LilyBelle', 'tolilybelle@gmail.com', 'hashed_password')
            ->name()->shouldReturn('LilyBelle');
    }

    function it_sets_the_email_correctly_on_the_revived_old_User()
    {
        $this->revive('0b2e8b80-f13d-43c2-851f-e06b25f8aa0a', 'LilyBelle', 'tolilybelle@gmail.com', 'hashed_password')
            ->email()->shouldReturn('tolilybelle@gmail.com');
    }

    function it_sets_the_password_correctly_on_the_revived_old_User()
    {
        $this->revive('0b2e8b80-f13d-43c2-851f-e06b25f8aa0a', 'LilyBelle', 'tolilybelle@gmail.com', 'hashed_password')
            ->validateCredentials('tolilybelle@gmail.com','password')->shouldReturn(true);
    }
}
