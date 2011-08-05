<?php
/* PrerollAd Test cases generated on: 2011-08-04 19:53:13 : 1312487593*/
App::import('Model', 'PrerollAd');

class PrerollAdTestCase extends CakeTestCase {
	var $fixtures = array('app.preroll_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.popover_ad', 'app.ad_type', 'app.popover_analytic', 'app.contact_type', 'app.preroll_analytic');

	function startTest() {
		$this->PrerollAd =& ClassRegistry::init('PrerollAd');
	}

	function endTest() {
		unset($this->PrerollAd);
		ClassRegistry::flush();
	}

}
