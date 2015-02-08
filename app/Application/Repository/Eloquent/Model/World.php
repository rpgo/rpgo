<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Rpgo\Application\Repository\Eloquent\Model\Member;
use Rpgo\Application\Repository\Eloquent\Model\User;

class World extends Model {

    public $incrementing = false;

    public $casts = ['id' => 'string'];

    public $dates = ['published_at'];

	protected $guarded = [];

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
