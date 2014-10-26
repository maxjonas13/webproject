<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('PK_userId');
			$table->string('name');
			$table->string('password');
			$table->integer('FK_roleId')->unsigned();
			$table->foreign('FK_roleId')->references('PK_roleId')->on('roles');
			$table->string('remember_token');
			$table->boolean('active');
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
		Schema::drop('users');
	}

}
