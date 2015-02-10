<?php namespace Rpgo\Model\World;

use Rpgo\Model\Exception\InvalidValueException;

class Slug extends \Rpgo\Model\Common\Slug {

    protected function validate($value)
    {
        parent::validate($value);

        if(strlen($value) > 20)
            throw new InvalidValueException;
    }

}
