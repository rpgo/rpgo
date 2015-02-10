<?php namespace Rpgo\Model\Location;

use Rpgo\Model\Exception\InvalidValueException;

class Slug extends \Rpgo\Model\Common\Slug {

    protected function validate($value)
    {
        parent::validate($value);

        if(strlen($value) > 40)
            throw new InvalidValueException;
    }

}
