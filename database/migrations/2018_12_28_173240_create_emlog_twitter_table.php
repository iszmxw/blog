<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogTwitterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('twitter', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('content', 65535);
			$table->string('img', 200)->nullable();
			$table->integer('author')->default(1)->index('author');
			$table->bigInteger('date');
			$table->integer('replynum')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_twitter');
	}

}
