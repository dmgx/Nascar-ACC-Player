<?php
/* PopoverAds Test cases generated on: 2011-08-04 19:58:32 : 1312487912*/
App::import('Controller', 'PopoverAds');

class TestPopoverAdsController extends PopoverAdsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PopoverAdsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.team_icon', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type', 'app.popover_analytic', 'app.contact_type');

	function startTest() {
		$this->PopoverAds =& new TestPopoverAdsController();
		$this->PopoverAds->constructClasses();
	}

	function endTest() {
		unset($this->PopoverAds);
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
