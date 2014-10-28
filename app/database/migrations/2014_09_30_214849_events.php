<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function($table){
            $table->increments('id');
            $table->string('name');
            $table->dateTime('dateTimeFrom');
            $table->dateTime('dateTimeTo');
            $table->string('description');
            $table->string('place');
            $table->string('pictureUrl');
            $table->boolean('publish');
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
        Schema::drop('events');
	}

}
