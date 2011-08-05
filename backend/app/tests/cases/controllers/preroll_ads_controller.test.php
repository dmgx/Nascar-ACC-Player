<?php
/* PrerollAds Test cases generated on: 2011-08-04 20:24:12 : 1312489452*/
App::import('Controller', 'PrerollAds');

class TestPrerollAdsController extends PrerollAdsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PrerollAdsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.preroll_ad', 'app.status', 'app.archive_feed', 'app.team_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic');

	function startTest() {
		$this->PrerollAds =& new TestPrerollAdsController();
		$this->PrerollAds->constructClasses();
	}

	function endTest() {
		unset($this->PrerollAds);
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
