<?php namespace Rpgo\Model\Contracts;

interface IdGenerator {

    /**
     * @return Id
     */
    public function next();

    /**
     * @param string $string
     * @return Id
     */
    public function from($string);

}