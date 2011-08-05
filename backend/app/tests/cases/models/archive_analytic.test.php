<?php
/* ArchiveAnalytic Test cases generated on: 2011-08-03 21:24:04 : 1312406644*/
App::import('Model', 'ArchiveAnalytic');

class ArchiveAnalyticTestCase extends CakeTestCase {
	var $fixtures = array('app.archive_analytic', 'app.archive_feed', 'app.category');

	function startTest() {
		$this->ArchiveAnalytic =& ClassRegistry::init('ArchiveAnalytic');
	}

	function endTest() {
		unset($this->ArchiveAnalytic);
		ClassRegistry::flush();
	}

}
