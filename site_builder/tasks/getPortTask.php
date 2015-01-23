<?php

require_once "phing/Task.php";

class getPortTask extends Task {

	private $port = null;

	public function setPort($port) {
		$this->port = (int)$port;
	}

	/**
	 * The init method: Do init steps.
	 */
	public function init() {
		// nothing to do here
	}

	private function portCheck()
	{

		$test = exec("netstat -ln | grep LISTEN | grep -o ':" . $this->port . " ' | awk {'print substr($0,2)'}");
		return strlen($test) <= 0 ? true : false;
	}

	private function getPort()
	{

		$portCheck = $this->portCheck();

		if(!$portCheck)
		{
			$this->port = (int)$this->port + 1;
			return $this->getPort();
		} else {
			return $this->port;
		}

	}

	/**
	 * The main entry point method.
	 */
	public function main() {
		$port = $this->getPort();
		$this->project->setProperty('config.usePort', $port);
	}
}

?>