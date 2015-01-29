<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Contracts\Member\Member as MemberContract;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;

final class Member implements MemberContract {

    /**
     * @var User
     */
    private $user;
    /**
     * @var \Rpgo\Model\Contracts\World\World
     */
    private $world;
    /**
     * @var Name
     */
    private $name;

    public function __construct(User $user, World $world, Name $name)
    {
        $this->user = $user;
        $this->world = $world;
        $this->name = $name;
    }
}
