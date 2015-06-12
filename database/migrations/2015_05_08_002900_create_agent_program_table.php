<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_program', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('agent_id')->unsigned();
			$table->foreign('agent_id')->references('id')->on('agents');
			$table->integer('program_id')->unsigned();
			$table->foreign('program_id')->references('id')->on('programs');
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
		Schema::drop('agent_program', function(Blueprint $table)
		{
			$table->dropForeign('agent_programs_agent_id_foreign');
			$table->dropColumn('agent_id');
			$table->dropForeign('agent_programs_program_id_foreign');
			$table->dropColumn('program_id');
		});
	}

}
