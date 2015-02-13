<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\Value;
use Rpgo\Model\Exception\InvalidValueException;

class Brand extends Value {

    protected $value;

    function __construct($brand)
    {
        $brand = (string) $brand;

        $this->checkLength($brand);

        $this->value = $brand;
    }

    private function checkLength($brand)
    {
        if( strlen(utf8_decode($brand)) == 0 )
            throw new InvalidValueException("The brand of a world cannot be empty.");

        if( strlen(utf8_decode($brand)) > 10 )
            throw new InvalidValueException("The brand of a world cannot be '${brand}', because it consists of more than 10 characters.");
    }
}
