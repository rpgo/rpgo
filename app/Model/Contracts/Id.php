<?php namespace Rpgo\Model\Contracts;

interface Id {

    /**
     * @param Id $id
     * @return bool
     */
    public function isIdenticalTo(self $id);

    /**
     * @return string
     */
    public function __toString();

}