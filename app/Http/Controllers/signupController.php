<?php namespace Ellie\Http\Controllers;

use Ellie\Http\Requests\CreateSignupRequest;
use Illuminate\Contracts\Auth\Guard;
use Ellie\Organization;
use Ellie\User;

class SignupController extends Controller {


	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('guest');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view('tasks.signup');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tasks.signup', $_GET);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSignupRequest $request)
	{

		$organization =  Organization::create([
			'name' => $request->ymca_name,
		]);

		$user = User::create([

			'organization_id' => $organization->id,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);

		//instantiate new site...

		//log in the new user...
		$this->auth->login( $user );

		return redirect('/dashboard');

	}

}
