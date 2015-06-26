<?php namespace App\Http\Controllers;

use App\Client;
use App\Temp;
use App\Program;
use App\Meal;

use Illuminate\Contracts\Auth\Guard;

use App\Http\Controllers\Controller;
use Auth;

use App\Http\Requests\ClientRequest;
use Carbon\Carbon;

class ClientController extends Controller {

	/**
	 * Displays the full roster of clients in the database
	 * @todo only display active clients
	 *
	 * @return Response
	 * */

	public function index()
	{
		$time = Carbon::now();
		$clients = Client::orderBy('lname', 'asc')->get();

		return view('clients.index', compact('clients', 'time'));
	}
	
	public function adNextMonth($month)
	{
		$time=carbon::parse($month);
		$time =$time->addMonth(1);
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('clients.index', compact('clients', 'time'));
	}
	
	public function adPreviousMonth($month)
	{
		$time=carbon::parse($month);
		$time=$time->subMonth(1);
		$clients = Client::orderBy('lastName', 'asc')->get();
		return view ('clients.index', compact('clients', 'time'));
	}

	/**
	 * Shows full information for each individual client
	 * 
	 * @todo hide client id in url (post?) enable slug for url
	 * @todo display associated family memebers
	 * @param integer $id
	 * @return Response
	 * 
	 */
	public function show($id)
	{
		$client = Client::findOrFail($id);

		return view('clients.show', compact('client'));
	}

	/**
	 * Allows for the creation of a new client 
	 * 
	 * @todo should not be inserted into Client table until approved by admin or case manager
	 * @return Reponse
	 * 
	 */
	public function create()
	{
		$programs = Program::lists('name', 'id');

		return view('clients.create', compact('programs'));
	}
	
	public function createFromTemp($id)
	{
		$programs = Program::lists('name', 'id');
		$client = Temp::findOrFail($id);
		
		return view('clients.fromTemp', compact('client', 'programs'));
	}

	/**
	 * Inserts new entry into Client Table and 
	 * checks for validation on form submission
	 * Authorization is checked for privilages
	 * 
	 * @param  	CreateClientRequest $request
	 * @return 	Response
	 */
	public function store(ClientRequest $request)
	{
		$input = $request->all();

		$client = Client::create($input);

		$program = Program::where('id', '=', $request->input('programs'))->first();
		$agent = Auth::user();

		$client->program()->associate($program);
		$client->agent()->associate($agent);

		$client->save();
		
		$temp = Temp::where('fname', '=', $request->fname)->where('lname', '=', $request->lname)->first();
		if($temp != null){
			$temp->delete();
		}

		$meal = new Meal;
		$meal->date_fed = date('Y-m-d');
		$meal->client()->associate($client);
		$meal->breakfast = 0;		
		$meal->lunch = 0;
		$meal->dinner = 0;
		$meal->save();

		return redirect('client');
	}

	public function edit($id)
	{
		$client = Client::findOrFail($id);

		return view('clients.edit', compact('client'));
	}

	public function update($id, ClientRequest $request)
	{
		$client = Client::findOrFail($id);

		$client->update($request->all());

		$client->save();

		return redirect('client');
	}

	public function destroy($id)
	{
		$client = Client::findOrFail($id);

		$client->delete();

		return redirect('client');
	}
	
	/**
	* this is the client roster connection
	*/
	public  function roster()
	{
		$clients = Client::orderBy('lastName', 'asc')->get();
		
		return view ('clients.roster', compact('clients'));
	}
}