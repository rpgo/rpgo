<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\Value;
use Rpgo\Model\World\Exception\EmptyWorldNameException;
use Rpgo\Model\World\Exception\LongWorldNameException;

class Name extends Value {

    protected $value;

    function __construct($name)
    {
        $name = (string) $name;

        $this->checkLength($name);

        $this->value = $name;
    }

    private function checkLength($name)
    {
        if( strlen(utf8_decode($name)) == 0 )
            throw new EmptyWorldNameException("The name of a world cannot be empty.");

        if( strlen(utf8_decode($name)) > 40 )
            throw new LongWorldNameException("The name of a world cannot be '${name}', because it consists of more than 40 characters.");
    }
}
