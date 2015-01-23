<?php

require_once "phing/Task.php";

class parseJsonTask extends Task {

	/**
	 * The message passed in the buildfile.
	 */
	private $jsonfile = null;
	private $containerObj = false;
	/**
	 * The setter for the attribute "message"
	 */
	public function setJsonfile($str) {
		$this->jsonfile = $str;
	}

	/**
	 * The init method: Do init steps.
	 */
	public function init() {
		// nothing to do here
	}

	private function setContainerArray()
	{
		$infoObj = json_decode(trim($this->jsonfile), true);

		if(is_array($infoObj))
		{
			$this->containerObj = $infoObj[0];
		}

	}

	private function getContainerArray()
	{
		return $this->containerObj;
	}
	/**
	 * The main entry point method.
	 */
	public function main() {

		//set container info
		$this->setContainerArray();

		$container = $this->getContainerArray();

		//set the project properties based on data within the container obj
		$this->project->setProperty('site.container.data', trim($this->jsonfile));
		$this->project->setProperty('site.container.id', $container['Id']);
		$this->project->setProperty('site.container.ip', $container['NetworkSettings']['IPAddress']);
		$this->project->setProperty('site.container.image', $container['Config']['Image']);
		$this->project->setProperty('site.container.port', $container['NetworkSettings']['Ports']['80/tcp'][0]['HostPort']);

	}
}

?>