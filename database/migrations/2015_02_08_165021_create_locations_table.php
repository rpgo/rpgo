<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('uuid', 36);
            $table->unsignedInteger('container_lft');
            $table->unsignedInteger('container_rgt');
            $table->unsignedInteger('container_id')->nullable();
            $table->string('name', 40);
            $table->string('slug', 40);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}
