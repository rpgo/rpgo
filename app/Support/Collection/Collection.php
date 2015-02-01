<?php namespace Rpgo\Support\Collection;

use Illuminate\Support\Collection as IlluminateCollection;

class Collection extends IlluminateCollection {

    public function add($item)
    {
        $this->push($item);
    }
}
