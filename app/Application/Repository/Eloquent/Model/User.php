<?php namespace Rpgo\Application\Repository\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Rpgo\Application\Repository\Eloquent\Model\Member;
use Rpgo\Application\Repository\Eloquent\Model\World;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    public $incrementing = false;

    public $casts = ['id' => 'string'];

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function creations()
    {
        return $this->hasMany(World::class, 'creator_id', 'id');
    }

    public function memberships()
    {
        return $this->hasMany(Member::class);
    }

    public function playfields()
    {
        return $this->belongsToMany(World::class, 'members');
    }

}
