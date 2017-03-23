<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->datetime('start_time')->nullable();
			$table->datetime('end_time')->nullable();
			$table->string('target_region')->nullable();
			$table->string('type')->nullable();
			$table->integer('time_interval')->nullable();
			$table->boolean('is_published')->default(false);
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
		Schema::drop('campaigns');
	}

}
