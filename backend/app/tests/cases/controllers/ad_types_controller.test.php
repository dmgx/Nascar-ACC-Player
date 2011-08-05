<?php
/* AdTypes Test cases generated on: 2011-08-04 15:53:12 : 1312473192*/
App::import('Controller', 'AdTypes');

class TestAdTypesController extends AdTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AdTypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.ad_type', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.popover_analytic', 'app.contact_type');

	function startTest() {
		$this->AdTypes =& new TestAdTypesController();
		$this->AdTypes->constructClasses();
	}

	function endTest() {
		unset($this->AdTypes);
		ClassRegistry::flush();
	}

}
