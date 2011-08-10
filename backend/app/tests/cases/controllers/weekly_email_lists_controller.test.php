<?php
/* WeeklyEmailLists Test cases generated on: 2011-08-09 21:56:22 : 1312926982*/
App::import('Controller', 'WeeklyEmailLists');

class TestWeeklyEmailListsController extends WeeklyEmailListsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class WeeklyEmailListsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.weekly_email_list');

	function startTest() {
		$this->WeeklyEmailLists =& new TestWeeklyEmailListsController();
		$this->WeeklyEmailLists->constructClasses();
	}

	function endTest() {
		unset($this->WeeklyEmailLists);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
