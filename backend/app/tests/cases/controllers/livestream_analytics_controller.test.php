<?php
/* LivestreamAnalytics Test cases generated on: 2011-08-04 15:54:09 : 1312473249*/
App::import('Controller', 'LivestreamAnalytics');

class TestLivestreamAnalyticsController extends LivestreamAnalyticsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LivestreamAnalyticsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.livestream_analytic', 'app.livestream_feed', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad');

	function startTest() {
		$this->LivestreamAnalytics =& new TestLivestreamAnalyticsController();
		$this->LivestreamAnalytics->constructClasses();
	}

	function endTest() {
		unset($this->LivestreamAnalytics);
		ClassRegistry::flush();
	}

}
