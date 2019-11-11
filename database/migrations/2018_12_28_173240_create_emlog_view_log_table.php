<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogViewLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('view_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ip', 15);
			$table->string('ip_position', 50);
			$table->integer('num')->nullable()->default(1)->comment('访问次数');
			$table->text('previous', 65535)->nullable()->comment('从哪里进来的');
			$table->text('full', 65535)->nullable()->comment('用户最后停留的页面');
			$table->integer('created_at');
			$table->integer('updated_at');
			$table->integer('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_view_log');
	}

}
