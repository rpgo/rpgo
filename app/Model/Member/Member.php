<?php namespace Rpgo\Model\Member;

use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class Member {

    /**
     * @var MemberId
     */
    private $id;

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

    public function __construct(MemberId $memberId, User $user, World $world, Name $name)
    {
        $this->id = $memberId;
        $this->user = $user;
        $this->world = $world;
        $this->name = $name;
    }

    public function id()
    {
        return $this->id;
    }

    public function user()
    {
        return $this->user;
    }

    public function world()
    {
        return $this->world;
    }

    public function name()
    {
        return $this->name;
    }
}
