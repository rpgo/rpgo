<?php namespace Rpgo\Model\World;

use Rpgo\Model\World\Exception\EmptyWorldBrandException;
use Rpgo\Model\World\Exception\LongWorldBrandException;

class Brand {

    private $brand;

    function __construct($brand)
    {
        $brand = (string) $brand;

        $this->checkLength($brand);

        $this->brand = $brand;
    }

    function __toString()
    {
        return $this->brand;
    }

    private function checkLength($brand)
    {
        if( strlen(utf8_decode($brand)) == 0 )
            throw new EmptyWorldBrandException("The brand of a world cannot be empty.");

        if( strlen(utf8_decode($brand)) > 10 )
            throw new LongWorldBrandException("The brand of a world cannot be '${brand}', because it consists of more than 10 characters.");
    }

    public function change($brand)
    {
        return new self($brand);
    }
}
