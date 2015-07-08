<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Program extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'programs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	  * get the agents with a certain program
	  *
	  * @return Agent
	  **/
	public function agent()
	{
		return $this->belongsToMany('App\Agent', 'agent_program', 'agent_id', 'program_id')->withTimestamps();
	}

	/**
	 * Gets the clients with a certain program
	 *
	 * @return client 
	 **/
	public function client()
	{
		return $this->hasMany('App\Client');
	}


}
