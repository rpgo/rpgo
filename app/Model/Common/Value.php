<?php namespace Rpgo\Model\Common;

class Value {

    protected $value;

    public function __construct($slug)
    {
        $this->value = $slug;
    }

    public function __toString()
    {
        return (string) $this->value();
    }

    public function changeValueTo($value)
    {
        return new static($value);
    }

    public function isEqualTo(self $value)
    {
        return $this == $value;
    }

    public function value()
    {
        return $this->value;
    }
}
