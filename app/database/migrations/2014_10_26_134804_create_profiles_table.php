<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table) {
			$table->increments('PK_profileId');
			$table->string('username', '50');
			$table->string('twitter', '50');
			$table->string('github', '50');
			$table->string('linkedin', '50');
			$table->string('pintres', '120');
			$table->string('googleplus', '50');
			$table->string('instagram', '50');
			$table->string('myspace', '50');
			$table->string('website', '70');
			$table->text('bio');
			$table->string('profilePicture');
			$table->integer('FK_userId')->unsigned();
			$table->foreign('FK_userId')->references('PK_userId')->on('users');
			$table->string('access_token');
			$table->string('access_token_secret');
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
		Schema::drop('profiles');
	}

}
