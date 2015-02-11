<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\Slug as CommonSlug;
use Rpgo\Model\Exception\InvalidValueException;

class Slug extends CommonSlug {

    protected function validate($value)
    {
        parent::validate($value);

        if(strlen($value) > 20)
            throw new InvalidValueException;
    }

}
