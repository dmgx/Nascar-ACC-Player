<?php
/* AdType Test cases generated on: 2011-08-04 15:44:27 : 1312472667*/
App::import('Model', 'AdType');

class AdTypeTestCase extends CakeTestCase {
	var $fixtures = array('app.ad_type', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.popover_analytic', 'app.contact_type');

	function startTest() {
		$this->AdType =& ClassRegistry::init('AdType');
	}

	function endTest() {
		unset($this->AdType);
		ClassRegistry::flush();
	}

}
