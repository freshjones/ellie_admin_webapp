<?php namespace Ellie\Http\Controllers;

use Ellie\Http\Requests\CreateSiteRequest;
use Ellie\Sites;
use Illuminate\Contracts\Queue\Queue;
use Ellie\Worker;

class SitesController extends EllieController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userid = $this->auth->user()->getAuthIdentifier();

		$sites = Sites::where('userid', '=', $userid)->get();

		return view('pages.sites.index', ['user' => $this->auth->user(), 'sites' => $sites] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pages.sites.create', ['user' => $this->auth->user()] );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Queue $queue, CreateSiteRequest $request)
	{

		$data = $request->except(['_token']);

		$data['userid']     = $this->auth->user()->getAuthIdentifier();
		$data['plan_id']    = 1;
		$data['status']     = 'building';
		$data['security']   = 1;

		$site = Sites::create( $data );

		$siteData = $site->attributesToArray();

		$queue->push('SiteBuilder', $siteData);

		return redirect( route('sites.index') );

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
