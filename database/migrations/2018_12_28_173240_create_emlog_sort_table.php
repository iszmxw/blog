<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogSortTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sort', function(Blueprint $table)
		{
			$table->increments('sid');
			$table->string('sortname')->default('');
			$table->string('alias', 200)->default('');
			$table->integer('taxis')->unsigned()->default(0);
			$table->integer('pid')->unsigned()->default(0);
			$table->text('description', 65535);
			$table->string('template')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_sort');
	}

}
