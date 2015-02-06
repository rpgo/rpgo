<?php

namespace unit\Rpgo\Model\User;

use Illuminate\Hashing\BcryptHasher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Support\Hash\Hash;

class PasswordSpec extends ObjectBehavior
{
    function let(BcryptHasher $hasher)
    {
        $this->beConstructedWith('password', false, $hasher);

        $hasher->make('password')->willReturn('password_hashed');
        $hasher->check('password', 'password_hashed')->willReturn(true);
        $hasher->make('newpassword')->willReturn('newpassword_hashed');
        $hasher->check('newpassword', 'newpassword_hashed')->willReturn(true);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\User\Password');
    }

    function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('password_hashed');;
    }

    function it_casts_itself_to_string(BcryptHasher $hasher)
    {
        $hasher->make('otherpassword')->willReturn('otherpassword_hashed');

        $this->beConstructedWith('otherpassword', false, $hasher);

        $this->__toString()->shouldReturn('otherpassword_hashed');
    }

    function it_is_immutable()
    {
        $this->change('newpassword')->shouldNotBe($this);
    }

    function it_morphs_into_a_new_password()
    {
        $this->change('newpassword')->shouldHaveType('Rpgo\Model\User\Password');
    }

    function it_changes_the_value_when_morphing()
    {
        $this->change('newpassword')->check('newpassword')->shouldReturn(true);
    }

    function it_cannot_be_empty()
    {
        $this->shouldThrow('Rpgo\Model\User\Exception\EmptyPasswordException')
            ->during('__construct', ['']);
    }
}
