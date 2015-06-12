<?php namespace App\Http\Controllers\Auth;
 
use App\Agent;
use App\Program;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
 
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
 
class AuthController extends Controller {
 
    /**
     * the model instance
     * @var User
     */
    protected $agent; 
    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    protected $auth;
 
    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */
    public function __construct(Guard $auth, Agent $agent)
    {
        $this->agent = $agent; 
        $this->auth = $auth;
 
        $this->middleware('guest', ['except' => ['getLogout']]); 
    }
 
    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {

        // if ($this->agent->roles() == "Administrator")
        // {
            $roles = Role::lists('name', 'id');
            $programs = Program::lists('name', 'id');
            return view('auth.register', compact('roles', 'programs'));
        // }
        // else{   
        //    return view('errors.unauth');
        // }
        
    }
 
    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        //code for registering a user goes here.
        $this->agent->name = $request->name;
        $this->agent->email = $request->email;
        $this->agent->password = bcrypt($request->password);
        $this->agent->save();
        //$this->auth->login($this->agent);
        
        $role_id = $request->input('roles');
        $program_ids = $request->input('programs');

        $agent = Agent::where('email', '=', $request->email)->first();

        $agent->roles()->attach($role_id);
        $agent->program()->attach($program_ids);

        $agent->save();  
        

        return redirect()->action('HomeController@index'); 
    }
 
    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }
 
    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('email', 'password')))
        {
            return redirect()->action('HomeController@index');
        }
 
        return redirect('auth/login')->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ]);
    }
 
    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();
 
        return redirect('/');
    }
 
}