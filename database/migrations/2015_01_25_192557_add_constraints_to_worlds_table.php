<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToWorldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('worlds', function(Blueprint $table)
		{
			$table->unique(['name', 'brand', 'slug']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('worlds', function(Blueprint $table)
		{
			$table->dropUnique(['name', 'brand', 'slug']);
		});
	}

}
