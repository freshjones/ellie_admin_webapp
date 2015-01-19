<?php namespace Ellie\Http\Controllers;

use Ellie\Http\Requests\LoginRequest;
use Ellie\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

	}

	public function logout() {

		$this->auth->logout();

		return redirect('/');

	}

	public function login() {

		return view('auth.login');

	}

	public function postLogin(LoginRequest $request) {

		if ( $this->auth->attempt( $request->only('email', 'password') ) )
		{
			return redirect()->intended( route('dashboard') );
		}

		return redirect('/login')
			->withInput($request->only('email'))
			->withErrors([
				'email' => 'These credentials do not match our records.',
			]);

	}

}
