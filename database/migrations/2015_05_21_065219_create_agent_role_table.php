<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_role', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('agent_id')->unsigned();
			$table->foreign('agent_id')->references('id')->on('agents');
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');
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
		Schema::drop('agent_role', function(Blueprint $table)
		{
			$table->dropForeign('agent_agent_id_foreign');
			$table->dropColumn('agent_id');
			$table->dropForeign('agent_roles_role_id_foreign');
			$table->dropColumn('role_id');
		});
	}

}
