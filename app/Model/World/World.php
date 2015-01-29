<?php namespace Rpgo\Model\World;

use Rpgo\Model\Contracts\User;
use Rpgo\Model\Contracts\World as WorldContract;

final class World implements WorldContract {

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

    function __construct(User $creator, Name $name, Slug $slug, Brand $brand)
    {
        $this->creator = $creator;
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
    }

}