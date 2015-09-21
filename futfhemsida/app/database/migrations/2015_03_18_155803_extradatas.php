<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Extradatas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_extradatas', function($table){
            $table->increments('id');
            $table->integer('registrationsId')->unsigned();
            $table->foreign('registrationsId')->references('id')->on('f_registrations');

            //felstavat, bör ändras
            $table->integer('extraFromControlId')->unsigned();
            $table->foreign('extraFromControlId')->references('id')->on('f_extraformcontrols');
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
