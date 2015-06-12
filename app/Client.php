<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
	 * The foreign keys that can be nulled out.
	 *
	 * @var array
	 */
	protected $nullable = ['family_id'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fname', 'lname', 'HMISID', 'gender', 'intake_date', 'DOB'];


	/**
	 * Gets the agent of the client
	 *
	 * @return agent 
	 **/
	public function agent()
	{
		return $this->belongsTo('App\Agent');
	}

	/**
	 * Gets the program of the client
	 *
	 * @return program 
	 **/
	public function program()
	{
		return $this->belongsTo('App\Program');
	}

	/**
	 * Gets the meals of the client
	 *
	 * @return meal 
	 **/
	public function meal()
	{
		return $this->hasMany('App\Meal');
	}

	/**
	 * Gets the family of the client
	 *
	 * @return family 
	 **/
	public function family()
	{
		return $this->belongsTo('App\Family');
	}

}
