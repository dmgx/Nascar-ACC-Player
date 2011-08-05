<?php
/* TeamIcon Test cases generated on: 2011-08-03 20:38:53 : 1312403933*/
App::import('Model', 'TeamIcon');

class TeamIconTestCase extends CakeTestCase {
	var $fixtures = array('app.team_icon');

	function startTest() {
		$this->TeamIcon =& ClassRegistry::init('TeamIcon');
	}

	function endTest() {
		unset($this->TeamIcon);
		ClassRegistry::flush();
	}

}
