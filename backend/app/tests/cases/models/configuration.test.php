<?php
/* Configuration Test cases generated on: 2011-08-09 22:19:49 : 1312928389*/
App::import('Model', 'Configuration');

class ConfigurationTestCase extends CakeTestCase {
	var $fixtures = array('app.configuration');

	function startTest() {
		$this->Configuration =& ClassRegistry::init('Configuration');
	}

	function endTest() {
		unset($this->Configuration);
		ClassRegistry::flush();
	}

}
