<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admins extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('admins', function($table){
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('level');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('events', function($table){
            $table->foreign('createdBy')->references('id')->on('admins');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('extraData');
        Schema::drop('extraFormControl');
        Schema::drop('registrations');
        Schema::drop('events');
		Schema::drop('admins');
	}

}
