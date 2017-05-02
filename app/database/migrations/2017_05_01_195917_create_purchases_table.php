<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('tweet_id')->nullable();
			$table->integer('retweet_count')->default(100);
			$table->float('cost', 5,2)->default(0);
			$table->boolean('is_approved')->default(0);
			$table->boolean('is_closed')->default(0);
			$table->string('payment_code')->nullable();
			$table->integer('retweeted_count')->nullable();
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
		Schema::drop('purchases');
	}

}
