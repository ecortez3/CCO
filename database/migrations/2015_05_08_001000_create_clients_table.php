<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fname');
			$table->string('lname');
			$table->string('gender');
			$table->integer('HMISID');
			$table->date('intake_date');
			$table->date('DOB');
			$table->integer('agent_id')->unsigned()->nullable();
			$table->foreign('agent_id')->references('id')->on('agents');
			$table->integer('program_id')->unsigned()->nullable();
			$table->foreign('program_id')->references('id')->on('programs');
			$table->integer('family_id')->unsigned()->nullable();
			$table->foreign('family_id')->references('id')->on('families');
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
		Schema::drop('clients', function(Blueprint $table)
		{
			$table::dropForeign('clients_agent_id_foreign');
			$table::dropColumn('agent_id');
			$table::dropForeign('clients_program_id_foreign');
			$table::dropColumn('program_id');
			$table::dropForeign('clients_family_id_foreign');
			$table::dropColumn('family_id');
		});
	}
}
