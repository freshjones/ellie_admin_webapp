<?php namespace Ellie\Http\Requests;

use Ellie\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;
use Ellie\Sites;

class ConfirmSiteRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Guard $auth)
	{
		$user = $auth->user();

		if($user)
		{
			$userID =$user->id;
			$siteID = $this->site;

			$site = Sites::find($siteID);

			if($site->userid === $userID)
			{
				return true;
			}

			return false;

		}

		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'password' => 'required',
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
