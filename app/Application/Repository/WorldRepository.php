<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

interface WorldRepository {

    /**
     * @param World $world
     * @return bool
     */
    public function save($world);

    /**
     * @param World $world
     * @return bool
     */
    public function delete($world);

    /**
     * @param string $id
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

    /**
     * @return Collection
     */
    public function fetchAllPublished();

}