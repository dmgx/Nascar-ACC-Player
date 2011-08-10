<?php
/* MonthlyEmailList Test cases generated on: 2011-08-09 21:54:03 : 1312926843*/
App::import('Model', 'MonthlyEmailList');

class MonthlyEmailListTestCase extends CakeTestCase {
	var $fixtures = array('app.monthly_email_list');

	function startTest() {
		$this->MonthlyEmailList =& ClassRegistry::init('MonthlyEmailList');
	}

	function endTest() {
		unset($this->MonthlyEmailList);
		ClassRegistry::flush();
	}

}
