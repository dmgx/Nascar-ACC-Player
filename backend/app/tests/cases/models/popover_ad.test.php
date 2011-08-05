<?php
/* PopoverAd Test cases generated on: 2011-08-04 19:59:19 : 1312487959*/
App::import('Model', 'PopoverAd');

class PopoverAdTestCase extends CakeTestCase {
	var $fixtures = array('app.popover_ad', 'app.status', 'app.archive_feed', 'app.team_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type', 'app.popover_analytic', 'app.contact_type');

	function startTest() {
		$this->PopoverAd =& ClassRegistry::init('PopoverAd');
	}

	function endTest() {
		unset($this->PopoverAd);
		ClassRegistry::flush();
	}

}
