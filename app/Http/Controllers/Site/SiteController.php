<?php namespace Ellie\Http\Controllers\Site;

use Ellie\Sites;
use Ellie\Http\Controllers\EllieController;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Auth\Guard;
use Ellie\Commands\SiteUpdate;
use Ellie\Http\Requests\ConfirmSiteRequest;
use Ellie\Commands\Site\SiteDeleteCommand;
use Ellie\Commands\Site\SiteStartCommand;
use Ellie\Commands\Site\SiteStopCommand;

class SiteController extends EllieController {

	private $params;

	public function __construct(Guard $auth, Router $router) {

		parent::__construct($auth);

		$id = $router->current()->getParameter('site');

		$site = Sites::find($id);
		$user = $this->auth->user();

		$this->setParams('site', $site);
		$this->setParams('user', $user );

	}

	public function index() {

		$site = $this->getParam('site');

		if( is_null($site) )
		{
			return redirect( route('sites.index') );
		}

		return view('pages.site.index', $this->params );

	}

	public function users() {

		return view('pages.site.users', $this->params );

	}

	public function plan() {

		return view('pages.site.plan', $this->params );

	}

	public function billing() {

		return view('pages.site.billing', $this->params );

	}

	public function domains() {

		return view('pages.site.domains', $this->params );

	}

	public function settings() {

		return view('pages.site.settings', $this->params );

	}

	public function update() {

		$siteObj = $this->getParam('site');

		$site = new \stdClass();
		$site->id = $siteObj->id;
		$site->url = $siteObj->url;

		$this->dispatch( new SiteUpdate($site) );

	}

	public function confirmDelete() {
		return view('pages.site.confirmDelete', $this->params );
	}

	public function confirmStart() {
		$this->setParams('route', 'site.start' );
		$this->setParams('action', 'Start' );
		$this->setParams('message', 'Enter your password below to confirm you would like to restart this site.' );
		return view('pages.site.confirmAction', $this->params );
	}

	public function start(ConfirmSiteRequest $request)
	{

		$site = $this->getParam('site');

		$isValid = $this->validateSiteRequestCredentials( $request->password );

		if( $isValid )
		{

			$site->status = 'Restarting';
			$site->save();

			$this->dispatch( new SiteStartCommand($site) );

			return redirect( route('site.index', $site->id) );
		}

		return redirect( route('site.confirm.start', $site->id) )
			->withErrors([
				'password' => 'That password does not match our records.',
			]);

	}

	public function confirmStop() {
		$this->setParams('route', 'site.stop' );
		$this->setParams('action', 'Stop' );
		$this->setParams('message', 'Enter your password below to confirm you would like to stop this site. <strong>Note: users will no longer be able to access this website while it is stopped</strong>' );
		return view('pages.site.confirmAction', $this->params );
	}

	public function stop(ConfirmSiteRequest $request)
	{

		$site = $this->getParam('site');

		$isValid = $this->validateSiteRequestCredentials( $request->password );

		if( $isValid )
		{

			$site->status = 'Stopping';
			$site->save();

			$this->dispatch( new SiteStopCommand($site) );

			return redirect( route('site.index', $site->id) );
		}

		return redirect( route('site.confirm.stop', $site->id) )
			->withErrors([
				'password' => 'That password does not match our records.',
			]);

	}


	public function delete(ConfirmSiteRequest $request)
	{

		$site = $this->getParam('site');

		$isValid = $this->validateSiteRequestCredentials( $request->password );

		if( $isValid )
		{

			$site->status = 'Deleting';
			$site->save();

			$this->dispatch( new SiteDeleteCommand($site) );

			return redirect( route('sites.index') );
		}

		return redirect( route('site.confirm.delete', $site->id) )
			->withErrors([
				'password' => 'That password does not match our records.',
			]);
	}

	private function setParams($param, $value)
	{
		$this->params[$param] = $value;
	}

	private function getParam($param)
	{
		return $this->params[$param];
	}

	private function validateSiteRequestCredentials($password)
	{

		$creds = array();
		$creds['email'] = $this->auth->user()->email;
		$creds['password'] = $password;

		return $this->auth->validate($creds);

	}

}
