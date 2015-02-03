<?php namespace Ellie\Commands;

use Ellie\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SiteDeployCommand extends Command implements SelfHandling, ShouldBeQueued {

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
		//
		$command = getenv('PHING') . ' create -f ' . getenv('SITEBUILDER') . '/build.xml'
			. ' -Dsiteid="' . $this->site->id . '"'
			. ' -Dsiteuid="' . $this->site->userid . '"'
			. ' -Dsiteurl="' . $this->site->url . '"'
			. ' -Dsitename="' . $this->site->name . '"'
			. ' -Dsitetemplate="' . $this->site->template_id . '"'
			. ' -Dsitecolor="' . $this->site->colorscheme_id . '"'
			. '';

		exec($command);

	}

}
