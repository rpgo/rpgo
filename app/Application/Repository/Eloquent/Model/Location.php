<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Baum\Node;

class Location extends Node {

    protected $primaryKey = 'aiid';

    protected $casts = ['uuid' => 'string'];

    protected $guarded = [ 'container_lft', 'container_rgt', 'container_depth' ];

    protected $parentColumn = 'container_aiid';

    protected $leftColumn = 'container_left';

    protected $rightColumn = 'container_right';

    protected $depthColumn = 'container_depth';

    public function world()
    {
        $this->hasOne(World::class, 'location_id', 'uuid');
    }

}
