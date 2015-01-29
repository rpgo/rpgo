<?php namespace Rpgo\Model\Member;

use Rpgo\Model\Contracts\Member\Member as MemberContract;
use Rpgo\Model\Contracts\Member\MemberId as MemberIdContract;
use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;

final class Member implements MemberContract {

    /**
     * @var MemberId
     */
    private $memberId;

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

    public function __construct(MemberIdContract $memberId, User $user, World $world, Name $name)
    {
        $this->memberId = $memberId;
        $this->user = $user;
        $this->world = $world;
        $this->name = $name;
    }
}
