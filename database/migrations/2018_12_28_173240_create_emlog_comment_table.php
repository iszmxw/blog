<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table)
		{
			$table->increments('cid');
			$table->integer('gid')->unsigned()->default(0)->index('gid');
			$table->integer('pid')->unsigned()->default(0);
			$table->bigInteger('date')->index('date');
			$table->string('poster', 20)->default('');
			$table->text('comment', 65535);
			$table->string('mail', 60)->default('');
			$table->string('url', 75)->default('');
			$table->string('ip', 128)->default('');
			$table->string('hide')->default('n')->index('hide');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_comment');
	}

}
