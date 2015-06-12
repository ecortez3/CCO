<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('families', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('headoffamily')->unsigned();	
			$table->foreign('headoffamily')->references('id')->on('clients');	
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
		Schema::drop('families', function(Blueprint $table)
		{
			$table->dropForeign('families_headoffamily_foreign');
			$table->dropColumn('headoffamily');
		});
	}

}
