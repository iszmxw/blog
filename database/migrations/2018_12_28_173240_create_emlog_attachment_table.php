<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachment', function(Blueprint $table)
		{
			$table->increments('aid');
			$table->integer('blogid')->unsigned()->default(0)->index('blogid');
			$table->string('filename')->default('');
			$table->integer('filesize')->default(0);
			$table->string('filepath')->default('');
			$table->bigInteger('addtime')->default(0);
			$table->integer('width')->default(0);
			$table->integer('height')->default(0);
			$table->string('mimetype', 40)->default('');
			$table->integer('thumfor')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_attachment');
	}

}
