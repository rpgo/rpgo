<?php namespace Rpgo\Application\Repository;

interface Repository {

    /**
     * @param string $relationship
     * @return Repository
     */
    public function with($relationship);

    /**
     * @param string $relationship
     * @return Repository
     */
    public function without($relationship);

}