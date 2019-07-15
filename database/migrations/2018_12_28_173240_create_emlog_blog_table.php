<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->increments('gid');
			$table->string('title')->default('');
			$table->bigInteger('date')->index('date');
			$table->text('content');
			$table->text('excerpt');
			$table->string('alias', 200)->default('');
			$table->integer('author')->default(1)->index('author');
			$table->integer('sort_id')->default(-1)->index('sort_id');
			$table->string('type', 20)->default('blog')->index('type');
			$table->integer('views')->unsigned()->default(0)->index('views');
			$table->integer('comnum')->unsigned()->default(0)->index('comnum');
			$table->integer('attnum')->unsigned()->default(0);
			$table->string('top')->default('n');
			$table->string('sortop')->default('n');
			$table->string('hide')->default('n')->index('hide');
			$table->string('checked')->default('y');
			$table->string('allow_remark')->default('y');
			$table->string('password')->default('');
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
		Schema::drop('emlog_blog');
	}

}
