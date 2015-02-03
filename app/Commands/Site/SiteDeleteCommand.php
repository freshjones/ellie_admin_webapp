<?php namespace Ellie\Commands\Site;

use Ellie\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SiteDeleteCommand extends Command implements SelfHandling, ShouldBeQueued {

	private $site;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($site)
	{
		//
		$this->site = $site;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{

		$command = getenv('PHING') . ' remove -f ' . getenv('SITEBUILDER') . '/build.xml'
			. ' -Dsiteid="' . $this->site->id . '"'
			. ' -Dsiteurl="' . $this->site->url . '"'
			. '';

		exec($command);

	}

}
