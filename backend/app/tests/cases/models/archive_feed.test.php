<?php
/* ArchiveFeed Test cases generated on: 2011-08-04 19:28:25 : 1312486105*/
App::import('Model', 'ArchiveFeed');

class ArchiveFeedTestCase extends CakeTestCase {
	var $fixtures = array('app.archive_feed', 'app.status', 'app.livestream_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic', 'app.preroll_ad', 'app.archive_analytic');

	function startTest() {
		$this->ArchiveFeed =& ClassRegistry::init('ArchiveFeed');
	}

	function endTest() {
		unset($this->ArchiveFeed);
		ClassRegistry::flush();
	}

}
