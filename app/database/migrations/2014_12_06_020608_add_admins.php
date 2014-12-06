<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmins extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('admins')->insert(array(
            'username' => 'Admin',
            'email' => 'admin@admin.se',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('admins') -> where('username', '=', "Admin")-> delete();
    }

}
