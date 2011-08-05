<?php
/* ArchiveFeeds Test cases generated on: 2011-08-04 16:28:31 : 1312475311*/
App::import('Controller', 'ArchiveFeeds');

class TestArchiveFeedsController extends ArchiveFeedsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArchiveFeedsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.archive_feed', 'app.status', 'app.livestream_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad', 'app.archive_analytic');

	function startTest() {
		$this->ArchiveFeeds =& new TestArchiveFeedsController();
		$this->ArchiveFeeds->constructClasses();
	}

	function endTest() {
		unset($this->ArchiveFeeds);
		ClassRegistry::flush();
	}

}
