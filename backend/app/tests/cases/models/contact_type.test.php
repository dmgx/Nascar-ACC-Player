<?php
/* ContactType Test cases generated on: 2011-08-04 15:44:58 : 1312472698*/
App::import('Model', 'ContactType');

class ContactTypeTestCase extends CakeTestCase {
	var $fixtures = array('app.contact_type', 'app.popover_analytic', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type');

	function startTest() {
		$this->ContactType =& ClassRegistry::init('ContactType');
	}

	function endTest() {
		unset($this->ContactType);
		ClassRegistry::flush();
	}

}
