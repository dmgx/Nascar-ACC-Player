<?php
/* WeeklyEmailList Test cases generated on: 2011-08-09 21:54:50 : 1312926890*/
App::import('Model', 'WeeklyEmailList');

class WeeklyEmailListTestCase extends CakeTestCase {
	var $fixtures = array('app.weekly_email_list');

	function startTest() {
		$this->WeeklyEmailList =& ClassRegistry::init('WeeklyEmailList');
	}

	function endTest() {
		unset($this->WeeklyEmailList);
		ClassRegistry::flush();
	}

}
