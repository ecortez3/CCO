<?php namespace App\Http\Requests;

use Request;

class TempRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fname'		=>	'required|min:2',
			'lname'		=>	'required|min:2',
			'gender'	=>	'required'
		];
	}

}
