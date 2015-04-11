<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubscriberFormRequest extends Request {

	/**
     * The URI to redirect to if validation fails
     *
     * @var string
     */
    // protected $redirect = '/subscribe';



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
		'firstName' => 'required|max:255',
        'lastName'  => 'required|max:255',
        'email'     => 'required|email|max:255',
		];
	}


}
