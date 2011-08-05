<?php
/* TeamIcons Test cases generated on: 2011-08-04 15:55:23 : 1312473323*/
App::import('Controller', 'TeamIcons');

class TestTeamIconsController extends TeamIconsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TeamIconsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.team_icon');

	function startTest() {
		$this->TeamIcons =& new TestTeamIconsController();
		$this->TeamIcons->constructClasses();
	}

	function endTest() {
		unset($this->TeamIcons);
		ClassRegistry::flush();
	}

}
