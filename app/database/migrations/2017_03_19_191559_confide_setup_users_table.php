<?php

use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        


        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->string('username')->nullable();
            $table->string('user_id')->nullable();
            $table->string('access_token')->nullable();
            $table->string('access_token_secret')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('user_type')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(true);
            $table->boolean('is_trial')->default(true);
            $table->date('next_subscription_date')->nullable();
            $table->integer('subscribed_package')->nullable();
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }
}
