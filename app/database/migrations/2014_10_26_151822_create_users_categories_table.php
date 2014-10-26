<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_categories', function($table){
			$table->increments('PK_users_categoryId');
			$table->integer('FK_userId')->unsigned();
			$table->foreign('FK_userId')->references('PK_userId')->on('users');
			$table->integer('FK_categoryId')->unsigned();
			$table->foreign('FK_categoryId')->references('PK_categoryId')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('users_categories');
	}

}
