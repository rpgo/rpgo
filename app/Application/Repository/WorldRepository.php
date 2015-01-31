<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\World\World;

interface WorldRepository {

    public function save(World $world);

}