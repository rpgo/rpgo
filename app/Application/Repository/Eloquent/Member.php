<?php namespace Rpgo\Application\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $fillable = ['name'];

	public function world()
    {
        return $this->belongsTo('Rpgo\Application\Repository\Eloquent\World');
    }

    public function user()
    {
        return $this->belongsTo('Rpgo\Application\Repository\Eloquent\User');
    }

}
