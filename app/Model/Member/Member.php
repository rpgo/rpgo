<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Contracts\Member as MemberContract;
use Rpgo\Model\Contracts\User;
use Rpgo\Model\Contracts\World;

final class Member implements MemberContract {

    /**
     * @var User
     */
    private $user;
    /**
     * @var World
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
