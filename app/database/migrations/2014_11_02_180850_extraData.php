<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('extraData', function($table){
            $table->increments('id');
            $table->integer('registrationsId')->unsigned();
            $table->foreign('registrationsId')->references('id')->on('registrations');
            $table->integer('extraFromControlId')->unsigned();
            $table->foreign('extraFromControlId')->references('id')->on('extraFormControl');
            $table->string('data');
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
		//
	}

}
