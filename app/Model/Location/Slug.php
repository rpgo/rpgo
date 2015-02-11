<?php namespace Rpgo\Model\Location;

use Rpgo\Model\Common\Slug as CommonSlug;
use Rpgo\Model\Exception\InvalidValueException;

class Slug extends CommonSlug {

    protected function validate($slug)
    {
        parent::validate($slug);

        if(strlen($slug) > 40)
            throw new InvalidValueException;
    }

}
