<?php namespace Rpgo\Model\Location;

class Location {

    /**
     * @var Id
     */
    private $id;
    /**
     * @var Name
     */
    private $name;
    /**
     * @var Slug
     */
    private $slug;

    /**
     * @var Location
     */
    private $container;

    public function __construct(Id $id, Name $name, Slug $slug, self $container = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->container = $container;
    }
}
