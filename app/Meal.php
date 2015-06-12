<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'meals';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['date_fed', 'client_id', 'breakfast', 'lunch', 'dinner'];

	/**
	 * Gets the client of the meal
	 *
	 * @return program 
	 **/
	public function client()
	{
		return $this->belongsTo('App\Client');
	}
}
