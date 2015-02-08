<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Kalnoy\Nestedset\Node;

class Location extends Node {

    const LFT = 'container_lft';

    const RGT = 'container_rgt';

    const PARENT_ID = 'container_id';

    protected $guarded = [ 'container_lft', 'container_rgt' ];

    // To allow mass asignment on parent attribute
    public function setContainerIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

}
