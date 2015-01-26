<?php namespace Rpgo;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $fillable = ['name'];

	public function world()
    {
        return $this->belongsTo('Rpgo\World');
    }

    public function user()
    {
        return $this->belongsTo('Rpgo\User');
    }

}
