<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_family', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');
			$table->integer('family_id')->unsigned();
			$table->foreign('family_id')->references('id')->on('clients');
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
		Schema::drop('client_family', function(Blueprint $table)
		{
			$table->dropForeign('client_families_client_id_foreign');
			$table->dropColumn('client_id');
			$table->dropForeign('client_families_family_id_foreign');
			$table->dropColumn('family_id');
		});
	}

}
