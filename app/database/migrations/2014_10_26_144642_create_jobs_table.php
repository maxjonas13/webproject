<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function($table){
			$table->increments('PK_jobId');
			$table->string('title', '50');
			$table->string('location', '50');
			$table->text('description');
			$table->boolean('fixed')->default(FALSE);
			$table->integer('FK_userId')->unsigned();
			$table->foreign('FK_userId')->references('PK_userId')->on('users');
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
		Schema::drop('jobs');
	}

}
