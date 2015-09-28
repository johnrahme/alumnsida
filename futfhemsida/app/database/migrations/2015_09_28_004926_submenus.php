<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('f_submenus', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('menuId')->unsigned();
            $table->foreign('menuId')->references('id')->on('f_menus');
            $table->string('name');
            $table->string('url');
            $table->longText('content');
            $table->integer('order');
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
        Schema::drop('f_submenus');
	}

}
