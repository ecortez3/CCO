<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'families';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['headoffamiliy'];

	/**
	 * Gets the clients with a certain family
	 *
	 * @return client 
	 **/
	public function client()
	{
		return $this->hasMany('App\Client');
	}

}
