<?php namespace Rpgo;

use Illuminate\Database\Eloquent\Model;

class World extends Model {

	protected $fillable = ["name", "slug", "creator_id"];

}
