<?php namespace Rpgo\Model\Location;

use Rpgo\Model\Common\Slug as CommonSlug;
use Rpgo\Model\Exception\InvalidValueException;

class Slug extends CommonSlug
{

    protected function validate($value)
    {
        parent::validate($value);

        if(strlen($value) > 40)
            throw new InvalidValueException;
    }

}
