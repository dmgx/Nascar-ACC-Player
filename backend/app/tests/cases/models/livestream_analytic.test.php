<?php
/* LivestreamAnalytic Test cases generated on: 2011-08-03 23:11:05 : 1312413065*/
App::import('Model', 'LivestreamAnalytic');

class LivestreamAnalyticTestCase extends CakeTestCase {
	var $fixtures = array('app.livestream_analytic', 'app.livestream_feed', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.popover_ad', 'app.preroll_ad');

	function startTest() {
		$this->LivestreamAnalytic =& ClassRegistry::init('LivestreamAnalytic');
	}

	function endTest() {
		unset($this->LivestreamAnalytic);
		ClassRegistry::flush();
	}

}
