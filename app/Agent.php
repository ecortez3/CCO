<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Agent extends Model implements AuthenticatableContract, CanResetPasswordContract{

	use Authenticatable, CanResetPassword;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'agents';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Gets the roles of an agent
	 *
	 * @return role 
	 **/
	public function roles()
	{
		return $this->belongsToMany('App\Role', 'agent_role', 'agent_id', 'role_id')->withTimestamps();
	}

	/**
	 * Gets the programs of an agent
	 *
	 * @return program 
	 **/
	public function program()
	{
		return $this->belongsToMany('App\Program', 'agent_program', 'agent_id', 'program_id')->withTimestamps();
	}

	/**
	 * Gets the clients of an agent
	 *
	 * @return program 
	 **/
	public function clients()
	{
		return $this->hasMany('App\Client');
	}
}
