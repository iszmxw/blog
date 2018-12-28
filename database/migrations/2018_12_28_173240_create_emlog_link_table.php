<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('link', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sitename', 30)->default('');
			$table->string('siteurl', 75)->default('');
			$table->string('description')->default('');
			$table->string('hide')->default('n');
			$table->integer('taxis')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_link');
	}

}
