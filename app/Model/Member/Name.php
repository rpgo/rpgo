<?php namespace Rpgo\Model\Member;

class Name {

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }


}
