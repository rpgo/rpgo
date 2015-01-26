<?php namespace Rpgo;

use Illuminate\Database\Eloquent\Model;

class World extends Model {

	protected $fillable = ["name", "slug", "brand", "creator_id"];

    public function creator()
    {
        return $this->belongsTo('Rpgo\User', 'creator_id', 'id');
    }

    public function members()
    {
        return $this->hasMany('Rpgo\Member');
    }

    public function users()
    {
        return $this->belongsToMany('Rpgo\User','members');
    }

}
