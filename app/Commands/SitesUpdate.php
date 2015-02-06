<?php namespace Ellie\Commands;

use Ellie\Commands\Site\SiteUpdate;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Ellie\Sites;
use Illuminate\Support\Facades\Queue;

class SitesUpdate extends Command implements SelfHandling {

	public $sites;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//we need to load in all the sites
		$this->getSites();

	}

	private function getSites()
	{
		$this->sites = Sites::all(['id','url']);
	}
	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{

		foreach($this->sites AS $site)
		{
			Queue::push(new SiteUpdate($site));
		};

	}

}
