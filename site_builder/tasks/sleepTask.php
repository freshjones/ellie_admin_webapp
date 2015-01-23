<?php

require_once "phing/Task.php";

class sleepTask extends Task {

	private $amount = 5;

	public function setAmount($str) {
		$this->amount = (int)$str;
	}

	/**
	 * The init method: Do init steps.
	 */
	public function init() {
		// nothing to do here
	}

	/**
	 * The main entry point method.
	 */
	public function main() {

		sleep($this->amount);

		$this->project->setProperty('config.runCheck', true);

	}
}

?>