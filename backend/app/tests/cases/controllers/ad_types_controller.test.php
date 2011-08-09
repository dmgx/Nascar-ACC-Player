<?php
/* AdTypes Test cases generated on: 2011-08-09 00:30:40 : 1312849840*/
App::import('Controller', 'AdTypes');

class TestAdTypesController extends AdTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AdTypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.ad_type', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.team_icon', 'app.livestream_feed', 'app.category', 'app.livestream_analytic', 'app.archive_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.popover_analytic', 'app.contact_type');

	function startTest() {
		$this->AdTypes =& new TestAdTypesController();
		$this->AdTypes->constructClasses();
	}

	function endTest() {
		unset($this->AdTypes);
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
