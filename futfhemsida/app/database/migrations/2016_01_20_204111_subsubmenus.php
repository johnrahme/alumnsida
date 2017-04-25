<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subsubmenus extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_subsubmenus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subMenuId')->unsigned();
            $table->foreign('subMenuId')->references('id')->on('f_submenus');
            $table->string('name');
            $table->string('url');
            $table->longText('content');
            $table->integer('order');
            $table->boolean('online');
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
        Schema::drop('f_subsubmenus');
    }

}
