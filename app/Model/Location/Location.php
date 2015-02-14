<?php namespace Rpgo\Model\Location;

use Rpgo\Support\Collection\Collection;

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
    private $locations;

    /**
     * @param Id $id
     * @param Name $name
     * @param Slug $slug
     * @param Location $container
     */
    public function __construct(Id $id, Name $name, Slug $slug, self $container = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->container = $container;
    }

    /**
     * @return string
     */
    public function id()
    {
        return (string) $this->id;
    }

    /**
     * @param null $name
     * @return string
     */
    public function name($name = null)
    {
        if($name)
            return (string) $this->name = $this->name->changeValueTo($name);
        
        return (string) $this->name;
    }

    /**
     * @return string
     */
    public function slug()
    {
        return (string) $this->slug;
    }

    /**
     * @param Location $container
     * @return null|Location
     */
    public function container(Location $container = null)
    {
        return $this->container = $container ?: $this->container;
    }

    public function isWorld()
    {
        return ! $this->container();
    }

    public function breadcrumbs()
    {
        if( ! $this->isWorld())
            return array_merge($this->container()->breadcrumbs(), [$this]);

        return [$this];
    }

    public function path()
    {
        if( ! $this->isWorld())
            return array_merge($this->container()->path(), [$this->slug()]);

        return [$this->slug()];
    }

    public function locations(Collection $locations = null)
    {
        return $this->locations = $locations ? : $this->locations;
    }
}
