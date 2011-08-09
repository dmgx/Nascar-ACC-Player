<?php
/* Statuses Test cases generated on: 2011-08-08 15:59:05 : 1312819145*/
App::import('Controller', 'Statuses');

class TestStatusesController extends StatusesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StatusesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.status', 'app.archive_feed', 'app.team_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad');

	function startTest() {
		$this->Statuses =& new TestStatusesController();
		$this->Statuses->constructClasses();
	}

	function endTest() {
		unset($this->Statuses);
		ClassRegistry::flush();
	}

}
