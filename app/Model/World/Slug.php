<?php namespace Rpgo\Model\World;

class Slug {

    private $slug;

    function __construct($slug)
    {
        $this->slug = $slug;
    }

    function __toString()
    {
        return $this->slug;
    }
}
