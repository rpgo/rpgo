<?php namespace Rpgo\Model\Contracts\Member;

use Rpgo\Model\Contracts\User\User;
use Rpgo\Model\Contracts\World\World;;

interface MemberFactory {

    /**
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function create(World $world, User $user, $name);

    /**
     * @param string $id
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function revive($id, World $world, User $user, $name);

}