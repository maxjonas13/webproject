<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs_categories', function($table){
			$table->increments('PK_jobs_categoryId');
			$table->integer('FK_jobId')->unsigned();
			$table->foreign('FK_jobId')->references('PK_jobId')->on('jobs');
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
		schema::drop('jobs_categories');
	}

}
