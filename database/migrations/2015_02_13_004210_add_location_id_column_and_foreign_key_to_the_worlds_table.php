<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationIdColumnAndForeignKeyToTheWorldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('worlds', function(Blueprint $table)
		{
            $table->string('location_id', 36)->nullable();
            $table->foreign('location_id')->references('uuid')->on('locations');
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
			$table->dropForeign('worlds_location_id_foreign');
            $table->dropColumn('location_id');
		});
	}

}
