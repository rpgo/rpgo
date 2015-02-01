<?php namespace Rpgo\Model\World;

class Trademark {

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Brand
     */
    private $brand;

    /**
     * @var Slug
     */
    private $slug;

    public function __construct(Name $name, Brand $brand, Slug $slug)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->slug = $slug;
    }

    public function name()
    {
        return (string) $this->name;
    }

    public function brand()
    {
        return (string) $this->brand;
    }

    public function slug()
    {
        return (string) $this->slug;
    }
}
