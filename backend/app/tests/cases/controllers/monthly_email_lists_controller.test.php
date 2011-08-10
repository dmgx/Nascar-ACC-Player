<?php
/* MonthlyEmailLists Test cases generated on: 2011-08-09 21:55:21 : 1312926921*/
App::import('Controller', 'MonthlyEmailLists');

class TestMonthlyEmailListsController extends MonthlyEmailListsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MonthlyEmailListsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.monthly_email_list');

	function startTest() {
		$this->MonthlyEmailLists =& new TestMonthlyEmailListsController();
		$this->MonthlyEmailLists->constructClasses();
	}

	function endTest() {
		unset($this->MonthlyEmailLists);
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
