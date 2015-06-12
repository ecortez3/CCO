<?php namespace App\Http\Controllers;

use App\Agent;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AgentRequest;

class AgentController extends Controller {

	/**
	 *	Will display all users that are registered and have access 
	 *	to some part of the database 
	 *	@todo 
	 *	should only be available to the admins
	 *
	 */
	public function index()
	{
		$agents = Agent::all();

		return view('agents.index', compact('agents'));
	}

	/**
	 * 	Shows some of the information of a particular user
	 *	based on the user's ID 
	 *	if no user is found based on ID, it will gracefully fail
	 *	@todo
	 *	shold only be available to Admin
	 *	things such as password should not appear?
	 *
	 */
	public function show($id)
	{
		$agent = Agent::findOrFail($id);

		return view('agent.show', compact('agent'));
	}
}
