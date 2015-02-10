<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Exception\InvalidValueException;

class Slug {

    private $value;

    public function __construct($value)
    {
        $value = (string) $value;
        $this->validate($value);
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function change($value)
    {
        return new static($value);
    }

    protected function validate($value)
    {
        if( ! preg_match('/^[a-z][-a-z0-9]+$/', $value))
            throw new InvalidValueException;
    }
}
