<?php
/* ArchiveAnalytics Test cases generated on: 2011-08-04 15:53:18 : 1312473198*/
App::import('Controller', 'ArchiveAnalytics');

class TestArchiveAnalyticsController extends ArchiveAnalyticsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArchiveAnalyticsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.archive_analytic', 'app.archive_feed', 'app.status', 'app.livestream_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad');

	function startTest() {
		$this->ArchiveAnalytics =& new TestArchiveAnalyticsController();
		$this->ArchiveAnalytics->constructClasses();
	}

	function endTest() {
		unset($this->ArchiveAnalytics);
		ClassRegistry::flush();
	}

}
