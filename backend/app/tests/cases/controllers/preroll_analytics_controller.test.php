<?php
/* PrerollAnalytics Test cases generated on: 2011-08-04 15:55:04 : 1312473304*/
App::import('Controller', 'PrerollAnalytics');

class TestPrerollAnalyticsController extends PrerollAnalyticsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PrerollAnalyticsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.preroll_analytic');

	function startTest() {
		$this->PrerollAnalytics =& new TestPrerollAnalyticsController();
		$this->PrerollAnalytics->constructClasses();
	}

	function endTest() {
		unset($this->PrerollAnalytics);
		ClassRegistry::flush();
	}

}
