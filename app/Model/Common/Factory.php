<?php namespace Rpgo\Model\Common;


abstract class Factory {

    protected function hasRequiredParameters($data)
    {
        foreach ($this->required as $key)
            if (!array_key_exists($key, $data))
                return false;

        return true;
    }
}