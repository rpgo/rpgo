<?php namespace Rpgo\Application\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

class World extends Model {

	protected $fillable = ["name", "slug", "brand", "creator_id"];

    public function creator()
    {
        return $this->belongsTo('Rpgo\Application\Repository\Eloquent\User', 'creator_id', 'id');
    }

    public function members()
    {
        return $this->hasMany('Rpgo\Application\Repository\Eloquent\Member');
    }

    public function users()
    {
        return $this->belongsToMany('Rpgo\Application\Repository\Eloquent\User','members');
    }

}
