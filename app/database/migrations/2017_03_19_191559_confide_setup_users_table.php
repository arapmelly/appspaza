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
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('user_type')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(true);
            $table->string('payment_method')->nullable();
            $table->string('payment_account')->nullable();
            $table->float('account_balance', 5,2)->default(0);
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
