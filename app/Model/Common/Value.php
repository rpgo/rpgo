<?php namespace Rpgo\Model\Common;

class Value {

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string) $this->value;
    }

    public function changeValueTo($value)
    {
        return new static($value);
    }
}
