<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admins extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_admins', function ($table) {
            $table->increments('id');
            $table->string('username');//Kanske tas bort?
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('level');
            $table->string('name');
            $table->string('surname');
            $table->string('tel');
            $table->integer('startYear');//Bör tas bort
            $table->string('company');//Bör tas bort
            $table->string('linkedInId');//Bör tas bort
            $table->string('pictureUrl');
            $table->string('accounttype');
            $table->string('description');
            $table->string('post');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('f_events', function ($table) {
            $table->foreign('createdBy')->references('id')->on('f_admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('f_extradatas');
        Schema::drop('f_extraformcontrols');
        Schema::drop('f_registrations');
        Schema::drop('f_events');
        Schema::drop('f_admins');
    }

}
