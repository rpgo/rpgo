<?php namespace Rpgo\Model\Member;

use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class Membership {


    /**
     * @var World
     */
    private $world;
    /**
     * @var User
     */
    private $user;

    public function __construct(World $world, User $user)
    {
        $this->world = $world;
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }

    public function world()
    {
        return $this->world;
    }
}
