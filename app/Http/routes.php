<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/**
 * Routes associated to Meal Counters 
 * May be used by any role besides Reporter 
 * 
 * Allows for:
 * The display of the roster
 * The creation of a new 
 
 * The full display of each client information
 *
 * */
Route::resource('client', 'ClientController');

Route::get('roster', 'ClientController@roster');

Route::get('insert/{id}', 'ClientController@createFromTemp');


/**
 * 	Routes are solely available to the Aministrator 
 *	Should not be accessed by any non-admin user 
 * 	or guest
 */
Route::get('agent', 'AgentController@index');

Route::get('agent/create', 'AgentController@create');

Route::get('agent/{id}', 'AgentController@show');

Route::get('agent/{id}/edit', 'AgentController@edit');


Route::resource('temp', 'TempController');

/**
* Meal Counter Routes
*
* Allows for the adding of meals to clients 
* and the creation of clients to be added to the roster later
* 
*/

Route::get('meal', 'MealController@meal');

/**
* Routes for the roster displays based on meal time
* 
*/

Route::get('meal_breakfast','MealController@mealRosterBreakfast');

Route::get('meal_lunch','MealController@mealRosterLunch');

Route::get('meal_dinner','MealController@mealRosterDinner');

/**
* Routes for the button display based on meal time
* 
*/

Route::get('breakfast_button/{id}','MealController@breakfastButton');

Route::get('lunch_button/{id}','MealController@lunchButton');

Route::get('dinner_button/{id}','MealController@dinnerButton');



//Button ON CLICK
Route::get('click_breakfast/{id}','MealController@btnClickBreakfast');

Route::get('click_lunch/{id}','MealController@btnClickLunch');

Route::get('click_dinner/{id}','MealController@btnClickDinner');

/**
 *  Reporters will view client reports
 *	in a variety of different ways
 */

Route::get('report_index', 'ReportController@viewIndex');

Route::get('next_month/{month}', 'ReportController@nextMonth');


Route::get('previous_month/{month}', 'ReportController@previousMonth');
 
Route::get('report_print_month/{month}', 'ReportController@printMonth');

Route::get('report_print_quarter/{cur}', 'ReportController@printQuarter');

Route::get('report_print_annual/{year}', 'ReportController@printAnnual');


Route::get('r_month_view/{time}', 'ReportController@printMonthReport');

Route::get('r_quarter_view/{cur}', 'ReportController@printQuarterReport');

Route::get('r_annual_view/{year}', 'ReportController@printAnnualReport');

Route::get('r_view_meal_index/{meal}', 'ReportController@viewMealIndex');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
