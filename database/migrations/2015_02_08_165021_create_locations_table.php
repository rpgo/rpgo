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
            $table->increments('aiid');
            $table->string('uuid', 36)->unique();
            $table->unsignedInteger('container_left')->nullable();
            $table->unsignedInteger('container_right')->nullable();
            $table->unsignedInteger('container_aiid')->nullable();
            $table->unsignedInteger('container_depth')->nullable();
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
