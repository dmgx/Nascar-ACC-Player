<?php
/* PopoverAnalytics Test cases generated on: 2011-08-04 15:54:44 : 1312473284*/
App::import('Controller', 'PopoverAnalytics');

class TestPopoverAnalyticsController extends PopoverAnalyticsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PopoverAnalyticsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.popover_analytic', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type', 'app.contact_type');

	function startTest() {
		$this->PopoverAnalytics =& new TestPopoverAnalyticsController();
		$this->PopoverAnalytics->constructClasses();
	}

	function endTest() {
		unset($this->PopoverAnalytics);
		ClassRegistry::flush();
	}

}
