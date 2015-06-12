<?php namespace App\Http\Controllers;

use Auth;
class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     * will vary based on role
     *
     * @return Response
     */
    public function index()
    {   
        $agent = Auth::user();
        $roles = $agent->roles->first();

        if($roles == null){
            return view('errors.unauth');
        }
        if($roles->name == 'Meal Counter'){
             return redirect(action('MealController@meal'));
        }
        if($roles->name == 'Reporter'){
            return redirect(action('ReportController@viewIndex'));
        }
        return view('home'); 
    }

}
