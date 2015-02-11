<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Exception\InvalidValueException;

class Slug extends Value {

    public function __construct($slug)
    {
        $slug = (string) $slug;
        $this->validate($slug);
        parent::__construct($slug);
    }

    protected function validate($slug)
    {
        if( ! preg_match('/^[a-z][-a-z0-9]+$/', $slug))
            throw new InvalidValueException;
    }
}
