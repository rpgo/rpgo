<?php namespace Rpgo\Application\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

class World extends Model {

    public $incrementing = false;

    public $casts = ['id' => 'string'];

	protected $fillable = ["name", "slug", "brand", "creator_id"];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'members');
    }

}
