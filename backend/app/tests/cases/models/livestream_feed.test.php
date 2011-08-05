<?php
/* LivestreamFeed Test cases generated on: 2011-08-03 22:11:04 : 1312409464*/
App::import('Model', 'LivestreamFeed');

class LivestreamFeedTestCase extends CakeTestCase {
	var $fixtures = array('app.livestream_feed', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.popover_ad', 'app.preroll_ad', 'app.livestream_analytic');

	function startTest() {
		$this->LivestreamFeed =& ClassRegistry::init('LivestreamFeed');
	}

	function endTest() {
		unset($this->LivestreamFeed);
		ClassRegistry::flush();
	}

}
