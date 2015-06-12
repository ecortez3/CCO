<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];


	/**
	  * get the agents with a certain role
	  *
	  * @return Agent
	  **/
	public function agent()
	{
		return $this->belongsToMany('App\Agent','agent_role', 'agent_id', 'role_id')->withTimestamps();
	}

}
