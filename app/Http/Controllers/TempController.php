<?php namespace App\Http\Controllers;

use App\Temp;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TempRequest;

class TempController extends Controller {

	/**
	  * Shows all entries in the Temp Table
	  *
	  * @return Response
	  * 
	  */
	  public function index()
	{
		$temps = Temp::all();

		return view('temps.index', compact('temps'));
	}

	/**
	 * Displays form for the creation of a new Temp entry
	 *
	 * @return Response
	 *
	 */
	public function create()
	{
		return view('temps.create');
	}

	/**
	 * Inserts new Temp into table 
	 * passes through validation and authorization
	 *
	 * @param CreateTempRequest $request
	 * @return Response
	 * 
	 */
	public function store(TempRequest $request)
	{
		$input = $request::all();

		Temp::create($input);

		return redirect('temp'); 
	}
	/**
	 * Display infofrmation of a pecific Temp entry ID
	 * will fail if no such ID exists 
	 * 
	 * @param  integer $id 
	 * @return Response
	 */
	public function show($id) 
	{
		$client = Temp::findOrFail($id);

		
		return view('temps.show', compact('client'));
	}

}
