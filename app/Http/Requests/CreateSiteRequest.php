<?php namespace Ellie\Http\Requests;

use Ellie\Http\Requests\Request;

class CreateSiteRequest extends Request {

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
			'name'              => 'required',
			'url'               => 'required|unique:sites,url|alpha_dash',
			'template_id'       => 'required|numeric',
			'colorscheme_id'    => 'required|numeric',
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
