<?php namespace Rpgo\Model\World;

use Rpgo\Model\Contracts\World\World as WorldContract;
use Rpgo\Model\Contracts\World\WorldId as WorldIdContract;
use Rpgo\Model\Contracts\User\User;

final class World implements WorldContract {

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

    function __construct(WorldIdContract $worldId, User $creator, Name $name, Slug $slug, Brand $brand)
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