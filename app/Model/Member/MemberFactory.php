<?php namespace Rpgo\Model\Member;

use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class MemberFactory {

    /**
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function create($name, World $world, User $user)
    {
        $id = new Id();
        $name = new Name($name);
        $membership = new Membership($world, $user);
        return new Member($id, $name, $membership);

    }

    /**
     * @param string $id
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function revive($id, $name, World $world, User $user)
    {
        $id = new Id($id);
        $name = new Name($name);
        $membership = new Membership($world, $user);
        return new Member($id, $name, $membership);
    }
}
