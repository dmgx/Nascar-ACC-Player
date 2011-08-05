<?php
/* Statuses Test cases generated on: 2011-08-04 19:38:04 : 1312486684*/
App::import('Controller', 'Statuses');

class TestStatusesController extends StatusesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StatusesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad');

	function startTest() {
		$this->Statuses =& new TestStatusesController();
		$this->Statuses->constructClasses();
	}

	function endTest() {
		unset($this->Statuses);
		ClassRegistry::flush();
	}

}
