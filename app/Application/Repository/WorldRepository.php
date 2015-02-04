<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\World\World;
use Rpgo\Support\Collection\Collection;

interface WorldRepository {

    /**
     * @param World $model
     * @return bool
     */
    public function save(World $model);

    /**
     * @param World $model
     * @return bool
     */
    public function delete(World $model);

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

    /**
     * @return Collection
     */
    public function fetchAllPublished();

}