<?php namespace Ellie\Commands\Site;

use Ellie\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SiteUpdate extends Command implements SelfHandling, ShouldBeQueued {

	public $site;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($site)
	{
		//set the site
		$this->setSite($site);
	}

	private function setSite($site)
	{
		$this->site = $site;
	}

	public function getSite()
	{
		return $this->site;
	}
	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{

		$site = $this->getSite();

		$command = getenv('PHING') . ' update -f ' . getenv('SITEBUILDER') . '/build.xml'
			. ' -Dsiteurl="' . $site->url . '"'
			. '';

		exec($command);

	}

}
