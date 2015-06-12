<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meals', function(Blueprint $table)
		{
			$table->timestamps();
			$table->date('date_fed');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->integer('breakfast')->nullable();
			$table->integer('lunch')->nullable();
			$table->integer('dinner')->nullable();
			$table->primary(['date_fed', 'client_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meals', function(Blueprint $table)
			{
				$table->dropForeign('meals_client_id_foreign');
				$table->dropColumn('client_id');
			});
	}

}
