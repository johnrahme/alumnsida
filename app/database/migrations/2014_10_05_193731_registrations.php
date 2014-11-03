<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Registrations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('registrations', function($table){
            $table->increments('id');
            $table->integer('eventId')->unsigned();
            $table->foreign('eventId')->references('id')->on('events');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->integer('tel');
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

	}

}
