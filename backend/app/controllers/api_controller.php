<?

	class ApiController extends AppController {
		
	    var $name = 'Api';
	    var $components = array('RequestHandler');
		var $uses = array("Configuration");
	    var $helpers = array('Text', 'Xml');

	    function beforeFilter() {
	        $this->Auth->allow('*');
	    }
	
		function embed() {
			$this->layoutPath = "none";
		}
		
		function testing() {
			$this->layoutPath = "acc";
		}
		
		function testing_embed() {
			$this->layoutPath = "none";
		}
		
		function testing_xml() {
			$this->set('configuration', $this->Configuration->find('first'));
			$this->layoutPath = "none";
			$this->RequestHandler->respondAs('xml');
		}
	
	}

?>