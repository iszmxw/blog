<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reply', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tid')->unsigned()->default(0)->index('gid');
			$table->bigInteger('date');
			$table->string('name', 20)->default('');
			$table->text('content', 65535);
			$table->string('hide')->default('n')->index('hide');
			$table->string('ip', 128)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_reply');
	}

}
