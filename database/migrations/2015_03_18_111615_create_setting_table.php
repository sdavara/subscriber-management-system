<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('logo',100);
			$table->string('title',100);
			$table->string('subtitle',100);
			$table->longtext('description');
			$table->string('theme',60);
			$table->string('twitter', 250)->nullable;
			$table->string('facebook', 250)->nullable;
			$table->string('googleplus', 250)->nullable;
			$table->string('linkedin', 250)->nullable;
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}