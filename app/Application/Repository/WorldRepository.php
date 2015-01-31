<?php namespace Rpgo\Application\Repository;

use Rpgo\Model\Contracts\World\World;

interface WorldRepository {

    public function save(World $world);

}