<?php
/* LivestreamFeeds Test cases generated on: 2011-08-04 20:09:18 : 1312488558*/
App::import('Controller', 'LivestreamFeeds');

class TestLivestreamFeedsController extends LivestreamFeedsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LivestreamFeedsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.livestream_feed', 'app.status', 'app.archive_feed', 'app.team_icon', 'app.category', 'app.archive_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad', 'app.livestream_analytic');

	function startTest() {
		$this->LivestreamFeeds =& new TestLivestreamFeedsController();
		$this->LivestreamFeeds->constructClasses();
	}

	function endTest() {
		unset($this->LivestreamFeeds);
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
