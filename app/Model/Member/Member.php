<?php namespace Rpgo\Model\Member;

class Member {

    /**
     * @var Id
     */
    private $id;

    /**
     * @var Name
     */
    private $name;
    /**
     * @var Membership
     */
    private $membership;

    public function __construct(Id $memberId, Name $name, Membership $membership)
    {
        $this->id = $memberId;
        $this->name = $name;
        $this->membership = $membership;
    }

    public function id()
    {
        return (string) $this->id;
    }

    public function user()
    {
        return $this->membership->user();
    }

    public function world()
    {
        return $this->membership->world();
    }

    public function name()
    {
        return (string) $this->name;
    }

    public function canSeeAdminPanel()
    {
        return true;
    }
}
