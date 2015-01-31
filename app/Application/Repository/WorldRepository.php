<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\World\World;

interface WorldRepository {

    /**
     * @param World $world
     * @return bool
     */
    public function save(World $world);

    /**
     * @param World $world
     * @return bool
     */
    public function delete(World $world);

    /**
     * @param $id
     * @return World
     */
    public function fetchById($id);

}