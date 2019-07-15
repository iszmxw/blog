<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmlogUserQqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_qq', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('uid', 32)->nullable()->default('')->comment('//后台用户id');
			$table->string('openid')->default('')->comment('//qq用户的openid');
			$table->string('nickname', 20)->default('')->comment('//用户的昵称');
			$table->string('header_img')->default('')->comment('//头像');
			$table->string('sex', 10)->nullable()->comment('//性别');
			$table->string('year', 10)->default('0')->comment('//出生年份');
			$table->string('province', 30)->nullable()->comment('//省份');
			$table->string('city', 30)->nullable()->comment('//城市');
			$table->integer('created_at')->default(0)->comment('//创建时间');
			$table->integer('updated_at')->default(0)->comment('//更新时间');
			$table->integer('deleted_at')->nullable()->comment('//删除时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emlog_user_qq');
	}

}
