<?php namespace Rpgo\Model\Member;

use Rpgo\Model\User\User;
use Rpgo\Model\World\World;

class MemberFactory {
    /**
     * @var MemberIdGenerator
     */
    private $generator;

    public function __construct(MemberIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function create(World $world, User $user, $name)
    {
        $id = $this->generator->next();
        $name = new Name($name);
        return new Member($id, $user, $world, $name);

    }

    /**
     * @param string $id
     * @param World $world
     * @param User $user
     * @param string $name
     * @return Member
     */
    public function revive($id, World $world, User $user, $name)
    {
        $id = $this->generator->from($id);
        $name = new Name($name);
        return new Member($id, $user, $world, $name);
    }
}
