<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSpecialtiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_specialties', function($table){
			$table->increments('PK_user_specialtiId');
			$table->integer('FK_userId')->unsigned();
			$table->foreign('FK_userId')->references('PK_userId')->on('users');
			$table->integer('FK_specialtiId')->unsigned();
			$table->foreign('FK_specialtiId')->references('PK_specialtiId')->on('specialties');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_specialties');
	}

}
