<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Client;
use App\Meal;

use Carbon\Carbon;

class MealController extends Controller {

	
	public function meal()
	{	
		return view ('meal.meal_time_select');
	}
	
	public function mealRosterBreakfast()
	{
		$meals = Meal::orderBy('date_fed', 'desc')->first();
		$clients = Client::orderBy('lname', 'asc')->get();

		if($meals->date_fed != date('Y-m-d')){
			foreach($clients as $client){
				$meals = new Meal;
				$meals->date_fed = date('Y-m-d');
				$meals->client()->associate($client);
				$meals->breakfast = 0;		
				$meals->lunch = 0;
				$meals->dinner = 0;
				$meals->save();
			}
		}
		return view ('meal.meal_roster_breakfast', compact('clients'));
	}
	
	public function mealRosterLunch()
	{
		$meals = Meal::orderBy('date_fed', 'desc')->first();
		$clients = Client::orderBy('lname', 'asc')->get();

		if($meals->date_fed != date('Y-m-d')){
			foreach($clients as $client){
				$meals = new Meal;
				$meals->date_fed = date('Y-m-d');
				$meals->client()->associate($client);
				$meals->breakfast = 0;		
				$meals->lunch = 0;
				$meals->dinner = 0;
				$meals->save();
			}
		}
		
		return view ('meal.meal_roster_lunch', compact('clients'));
	}
	
	public function mealRosterDinner()
	{
		$meals = Meal::orderBy('date_fed', 'desc')->first();
		$clients = Client::orderBy('lname', 'asc')->get();

		if($meals->date_fed != date('Y-m-d')){
			foreach($clients as $client){
				$meals = new Meal;
				$meals->date_fed = date('Y-m-d');
				$meals->client()->associate($client);
				$meals->breakfast = 0;		
				$meals->lunch = 0;
				$meals->dinner = 0;
				$meals->save();
			}
		}

		return view ('meal.meal_roster_dinner', compact('clients'));
	}
	
	public function breakfastButton($id)
	{
		$client = Client::findOrFail($id);
		return view('meal.breakfast_button', compact('client'));
	}

	public function lunchButton($id)
	{
		$client = Client::findOrFail($id);
		return view('meal.lunch_button', compact('client'));
	}
	
	public function dinnerButton($id)
	{
		$client = Client::findOrFail($id);
		return view('meal.dinner_button', compact('client'));
	}
	
	public function btnClickBreakfast($id)
	{
		$client = Client::findOrFail($id);
		$meal = Meal::where('date_fed', '=', date('Y-m-d'))->where('client_id', '=', $client->id)->first();
		
		if($meal->breakfast == 1){
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['breakfast' => 0, 'client_id' => $client->id]);
		}
		else{
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['breakfast' => 1, 'client_id' => $client->id]);
		}

		return redirect(action('MealController@mealRosterBreakfast'));
		//return $meal;
	}
	
	public function btnClickLunch($id)
	{
		$client = Client::findOrFail($id);
		$meal = Meal::where('date_fed', '=', date('Y-m-d'))->where('client_id', '=', $client->id)->first();
		
		if($meal->lunch == 1){
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['lunch' => 0, 'client_id' => $client->id]);
		}
		else{
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['lunch' => 1, 'client_id' => $client->id]);
		}
		
		return redirect(action('MealController@mealRosterLunch'));
	}
	
	public function btnClickDinner($id)
	{		
		$client = Client::findOrFail($id);
		$meal = Meal::where('date_fed', '=', date('Y-m-d'))->where('client_id', '=', $client->id)->first();
		
		if($meal->dinner == 1){
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['dinner' => 0, 'client_id' => $client->id]);
		}
		else{
			\DB::table('meals')->where('client_id', '=', $client->id)
			->where('date_fed', '=', date('Y-m-d'))
			->update(['dinner' => 1, 'client_id' => $client->id]);
		}
		
		return redirect(action('MealController@mealRosterDinner'));
	}

}
