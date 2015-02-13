<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Kalnoy\Nestedset\Node;

class Location extends Node {

    public $primaryKey = 'aiid';

    public $casts = ['uuid' => 'string'];

    const LFT = 'container_lft';

    const RGT = 'container_rgt';

    const PARENT_ID = 'container_id';

    protected $guarded = [ 'container_lft', 'container_rgt' ];

    public function setContainerIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    public function world()
    {
        $this->hasOne(World::class, 'location_id', 'uuid');
    }

}
