<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

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

    /**
     * @return Collection
     */
    public function fetchAll();

    /**
     * @param string $slug
     * @return World
     */
    public function fetchBySlug($slug);

}