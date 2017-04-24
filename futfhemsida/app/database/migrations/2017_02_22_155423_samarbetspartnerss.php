<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Samarbetspartnerss extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_samarbetspartner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->longText('abstract');
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
        Schema::drop('f_samarbetspartner');
    }

}
