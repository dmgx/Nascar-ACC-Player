<?php
/* Configurations Test cases generated on: 2011-08-09 22:20:17 : 1312928417*/
App::import('Controller', 'Configurations');

class TestConfigurationsController extends ConfigurationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ConfigurationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.configuration');

	function startTest() {
		$this->Configurations =& new TestConfigurationsController();
		$this->Configurations->constructClasses();
	}

	function endTest() {
		unset($this->Configurations);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
