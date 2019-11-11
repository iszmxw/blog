<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('uid');
			$table->string('username', 32)->default('')->index('username');
			$table->string('password', 225)->default('');
			$table->string('nickname', 20)->default('');
			$table->string('role', 60)->default('');
			$table->string('ischeck')->default('n');
			$table->string('photo')->default('');
			$table->string('email', 60)->default('');
			$table->string('description')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_user');
	}

}
