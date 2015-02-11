<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Exception\InvalidValueException;

class Slug extends Value {

    protected $value;

    public function __construct($value)
    {
        $value = (string) $value;
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate($value)
    {
        if( ! preg_match('/^[a-z][-a-z0-9]+$/', $value))
            throw new InvalidValueException;
    }
}
