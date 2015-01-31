<?php namespace Rpgo\Model\World;

class Name {

    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }


}
