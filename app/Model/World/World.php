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


    function __construct(User $creator, $name, $slug, $brand)
    {
        $this->creator = $creator;
        $this->name = new Name($name);
        $this->slug = new Slug($slug);
        $this->brand = new Brand($brand);
    }

}