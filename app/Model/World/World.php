<?php namespace Rpgo\Model\World;

use Rpgo\Model\User\User;

class World {

    /**
     * @var WorldId
     */
    private $id;

    /**
     * @var User
     */
    private $creator;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Slug
     */
    private $slug;

    /**
     * @var Brand
     */
    private $brand;

    function __construct(WorldId $worldId, User $creator, Name $name, Slug $slug, Brand $brand)
    {
        $this->id = $worldId;
        $this->creator = $creator;
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
    }

    public function addMember()
    {

    }

}