<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'temps';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fname', 'lname', 'gender'];

}
