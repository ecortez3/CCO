<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends Request {

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
		switch($this->method())
	    {
	        
	        case 'GET':
        	case 'DELETE':
        	{
            	return [];
        	}
        	case 'POST':
	        {
	            return [
					'fname'	=>	'required|min:2', 
					'lname'	=>	'required|min:2', 
					'gender'	=>	'required',
					'HMISID' =>	'required|min:7|unique:clients',
				];
	        }
	        case 'PUT':
	        case 'PATCH':
	        {
	            return [
					'fname'	=>	'required|min:2', 
					'lname'	=>	'required|min:2', 
					'gender'	=>	'required',
					'HMISID' =>	'required|min:7|',
			];
	        }
	        default:break;
	    }
	}
}
