<?php namespace Ellie\Http\Requests;

use Ellie\Http\Requests\Request;

class CreateSignupRequest extends Request {

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

		//'url'   => ['required','unique:url,url'],
		return [
			'ymca_name'     => 'required',
			'first_name'    => 'required',
			'last_name'     => 'required',
			'ymca_name'     => 'required|unique:organizations,name',
			'email'     	=> 'required|unique:users|email',
			'password'      => 'required|min:6',
			'template'      => 'required',
		];
	}

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
		return $this->all();
	}

}
