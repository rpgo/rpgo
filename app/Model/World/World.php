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

    public function id()
    {
        return (string) $this->id;
    }

    public function name()
    {
        return (string) $this->name;
    }

    public function slug()
    {
        return (string) $this->slug;
    }

    public function brand()
    {
        return (string) $this->brand;
    }

    public function creator()
    {
        return $this->creator;
    }

}