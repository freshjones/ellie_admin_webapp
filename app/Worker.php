<?php namespace Ellie;

class SiteBuilder {

	public function fire($job, $data)
	{

		//execute the site builder script
		$command = 'phing -f /home/vagrant/apps/ellie/site_builder/build.xml';
		exec($command);

	}

}