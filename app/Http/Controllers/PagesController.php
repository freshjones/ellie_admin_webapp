<?php namespace Ellie\Http\Controllers;

use Ellie\Http\Requests;
use Ellie\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

class PagesController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('auth', ['only' => 'dashboard']);

	}

	public function templates() {

		return view('pages.templates');

	}

	public function dashboard() {

		return view('pages.dashboard', ['user' => $this->auth->user() ]);

	}

}
