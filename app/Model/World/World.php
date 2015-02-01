<?php namespace Rpgo\Model\World;

use Rpgo\Model\User\User;
use Rpgo\Support\Collection\Collection;

class World {

    /**
     * @var WorldId
     */
    private $id;
    /**
     * @var Trademark
     */
    private $trademark;
    /**
     * @var User
     */
    private $creator;

    /**
     * @var Collection
     */
    private $members;

    function __construct(WorldId $id, Trademark $trademark, User $creator)
    {
        $this->id = $id;
        $this->trademark = $trademark;
        $this->creator = $creator;
    }

    public function id()
    {
        return (string) $this->id;
    }

    public function name()
    {
        return (string) $this->trademark->name();
    }

    public function slug()
    {
        return (string) $this->trademark->slug();
    }

    public function brand()
    {
        return (string) $this->trademark->brand();
    }

    public function creator()
    {
        return $this->creator;
    }

    public function members(Collection $members = null)
    {
        return $members ? $this->members = $members : $this->members;
    }

}