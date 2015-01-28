<?php namespace Rpgo\Application\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

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
