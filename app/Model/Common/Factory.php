<?php namespace Rpgo\Model\Common;

/**
 * The common component of every Factory in the model.
 *
 * Class Factory
 * @package Rpgo\Model\Common
 */
abstract class Factory {

    /**
     * The names of the required parameters for making a new entity.
     *
     * @var array
     */
    protected $required;

    /**
     * Check whether the data has the required parameters as keys.
     *
     * @param array $data
     * @return bool
     */
    protected function hasRequiredParameters($data)
    {
        foreach ($this->required as $key)
            if ( ! array_key_exists($key, $data) )
                return false;

        return true;
    }
}