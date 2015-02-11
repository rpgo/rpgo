<?php namespace Rpgo\Model\Location;

use Rpgo\Model\Common\Value;
use Rpgo\Model\Exception\InvalidValueException;

class Name extends Value {

    function __construct($name)
    {
        $name = (string) $name;

        $this->checkLength($name);

        parent::__construct($name);
    }

    private function checkLength($name)
    {
        if( strlen(utf8_decode($name)) == 0 )
            throw new InvalidValueException;

        if( strlen(utf8_decode($name)) > 40 )
            throw new InvalidValueException;
    }

}
