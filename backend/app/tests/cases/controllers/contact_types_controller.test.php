<?php
/* ContactTypes Test cases generated on: 2011-08-04 15:53:34 : 1312473214*/
App::import('Controller', 'ContactTypes');

class TestContactTypesController extends ContactTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ContactTypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.contact_type', 'app.popover_analytic', 'app.popover_ad', 'app.status', 'app.archive_feed', 'app.left_icon', 'app.right_icon', 'app.category', 'app.archive_analytic', 'app.livestream_feed', 'app.livestream_analytic', 'app.preroll_ad', 'app.preroll_analytic', 'app.ad_type');

	function startTest() {
		$this->ContactTypes =& new TestContactTypesController();
		$this->ContactTypes->constructClasses();
	}

	function endTest() {
		unset($this->ContactTypes);
		ClassRegistry::flush();
	}

}
