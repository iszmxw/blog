<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogNaviTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('naviname', 30)->default('')->comment('导航栏名称');
			$table->string('navicon')->nullable()->comment('导航栏icon');
			$table->string('url', 75)->default('')->comment('链接地址');
			$table->string('hide')->default('n')->comment('是否隐藏');
			$table->string('newtab')->default('n')->comment('是否新窗口打开');
			$table->integer('taxis')->unsigned()->default(0)->comment('排序');
			$table->integer('pid')->unsigned()->default(0)->comment('上级导航栏id');
			$table->string('isdefault')->default('n')->comment('//是否根更目录');
			$table->string('type')->default('1')->comment('//导航栏类型1--系统地址，2--链接地址');
			$table->integer('type_id')->unsigned()->default(0)->comment('//系统的栏目id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_navi');
	}

}
