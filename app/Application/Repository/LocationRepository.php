<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\Location\Location;
use Rpgo\Support\Collection\Collection;

interface LocationRepository extends Repository {

    /**
     * @param Location $location
     * @return bool
     */
    public function save($location);

    /**
     * @param Location $location
     * @return bool
     */
    public function delete($location);

    /**
     * @param string $id
     * @return Location
     */
    public function fetchById($id);

    /**
     * @return Collection
     */
    public function fetchAll();

}