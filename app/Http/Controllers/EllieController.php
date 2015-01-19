<?php namespace Ellie\Http\Controllers;

use Ellie\Http\Requests;
use Ellie\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

class EllieController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('auth');

	}

}
