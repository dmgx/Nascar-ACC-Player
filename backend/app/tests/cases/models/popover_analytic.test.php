<?php
/* PopoverAnalytic Test cases generated on: 2011-08-03 23:16:16 : 1312413376*/
App::import('Model', 'PopoverAnalytic');

class PopoverAnalyticTestCase extends CakeTestCase {
	var $fixtures = array('app.popover_analytic', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type', 'app.contact_type');

	function startTest() {
		$this->PopoverAnalytic =& ClassRegistry::init('PopoverAnalytic');
	}

	function endTest() {
		unset($this->PopoverAnalytic);
		ClassRegistry::flush();
	}

}
