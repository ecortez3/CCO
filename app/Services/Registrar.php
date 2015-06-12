<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 * @todo
	 * Add data about programs and and Model information
	 * @todo 
	 * pass custom usre registration page through this validator and savor and not the one in UserController
	 * 
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' 		=> $data['name'],
			'email' 	=> $data['email'],
			'password'	=> bcrypt($data['password']),
			'role' 		=> $data['role'],
			'Naomi'		=> $data['naomi'],
			'Hannah'	=> $data['hannah'],
			'Sylvie'	=> $data['sylvie'],
			'Outreach'	=> $data['outreach'],
			'Prgm5'		=> $data['prgn5'],
			'Prgm6'		=> $data['prgm6'],
		]);
	}

}
