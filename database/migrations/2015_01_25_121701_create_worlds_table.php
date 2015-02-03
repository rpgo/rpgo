<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worlds', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
            $table->string('creator_id', 36);
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('name', 40)->unique();
            $table->string('slug', 20)->unique();
            $table->string('brand', 10)->unique();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worlds');
	}

}
