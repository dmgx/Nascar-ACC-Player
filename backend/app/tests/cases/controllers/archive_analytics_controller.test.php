<?php
/* ArchiveAnalytics Test cases generated on: 2011-08-12 14:18:53 : 1313173133*/
App::import('Controller', 'ArchiveAnalytics');

class TestArchiveAnalyticsController extends ArchiveAnalyticsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArchiveAnalyticsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.archive_analytic', 'app.archive_feed', 'app.status', 'app.livestream_feed', 'app.team_icon', 'app.category', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_ad', 'app.preroll_analytic');

	function startTest() {
		$this->ArchiveAnalytics =& new TestArchiveAnalyticsController();
		$this->ArchiveAnalytics->constructClasses();
	}

	function endTest() {
		unset($this->ArchiveAnalytics);
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
