<?php namespace Rpgo\Model\Contracts;

interface IdGenerator {

    /**
     * @return Id
     */
    public function generateNewId();

    /**
     * @param string $id
     * @return Id
     */
    public function idFromString($id);

}