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
            $table->longText('description');
            $table->string('place');
            $table->string('pictureUrl');
            $table->boolean('publish');
            $table->boolean('reg');
            $table->dateTime('regFrom');
            $table->dateTime('regTo');
            $table->integer('regnr');
            $table->boolean('reserv');
            $table->integer('createdBy')->unsigned();
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
