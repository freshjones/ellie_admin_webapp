<?php namespace Ellie\Http\Controllers\Site;

use Ellie\Sites;
use Ellie\Http\Controllers\EllieController;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Auth\Guard;
use Ellie\Commands\SiteUpdate;
use Ellie\Http\Requests\DeleteSiteRequest;
use Ellie\Commands\Site\SiteDeleteCommand;

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

	public function delete(DeleteSiteRequest $request)
	{
		$creds = array();
		$creds['email'] = $this->auth->user()->email;
		$creds['password'] = $request->password;

		$site = $this->getParam('site');

		if( $this->auth->validate($creds) )
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

	private function getParams()
	{
		return $this->params;
	}

	private function getParam($param)
	{
		return $this->params[$param];
	}

}
