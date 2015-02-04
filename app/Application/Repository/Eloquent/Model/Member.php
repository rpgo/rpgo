<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Rpgo\Application\Repository\Eloquent\Model\User;
use Rpgo\Application\Repository\Eloquent\Model\World;

class Member extends Model {

    public $incrementing = false;

    public $casts = ['id' => 'string'];

    protected $fillable = ['name'];

	public function world()
    {
        return $this->belongsTo(World::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
