<?php namespace Rpgo\Model\Common;

/**
 * The contract for an identity.
 *
 * Interface Id
 * @package Rpgo\Model\Common
 */
interface Id {

    /**
     * Check whether a given id is identical to this one.
     *
     * @param Id $id
     * @return bool
     */
    public function isIdenticalTo(self $id);

    /**
     * Cast the id to string.
     *
     * @return string
     */
    public function __toString();

}