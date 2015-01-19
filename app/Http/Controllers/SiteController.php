<?php namespace Ellie\Http\Controllers;

use Ellie\Sites;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Auth\Guard;

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

	private function setParams($param, $value)
	{
		$this->params[$param] = $value;
	}

	private function getParams()
	{
		return $this->params;
	}

}
