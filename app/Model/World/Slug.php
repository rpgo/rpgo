<?php namespace Rpgo\Model\World;

use Rpgo\Model\Common\Slug as CommonSlug;
use Rpgo\Model\Exception\InvalidValueException;

class Slug extends CommonSlug {

    protected function validate($slug)
    {
        parent::validate($slug);

        if(strlen($slug) > 20)
            throw new InvalidValueException;
    }

}
