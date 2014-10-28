<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(array(
			'name' => 'John DS',
			'email' => 'john.DSA.se@gmail.com',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('users')->insert(array(
			'name' => 'John as',
			'email' => 'john.rahme.se@DSF.com',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('users')->insert(array(
			'name' => 'DS Rahme',
			'email' => 'john.rahme.se@DS.com',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('users')->insert(array(
			'name' => 'aA Rahme',
			'email' => 'john.DSA.se@gmail.com',
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('users')->insert(array(
			'name' => 'DSa Rahme',
			'email' => 'john.rahme.se@gmail.DS',
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
		DB::table('users') -> where('name', '=', "John DS")-> delete();
		DB::table('users') -> where('name', '=', "John as")-> delete();
		DB::table('users') -> where('name', '=', "DS Rahme")-> delete();
		DB::table('users') -> where('name', '=', "aA Rahme")-> delete();
		DB::table('users') -> where('name', '=', "DSa Rahme")-> delete();
	}

}
