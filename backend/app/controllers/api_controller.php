<?

	class ApiController extends AppController {
		
	    var $name = 'Api';
		var $uses = array();
	    var $helpers = array('Text', 'Xml');

	    function beforeFilter() {
	        $this->Auth->allow('*');
	    }
	
		function embed() {
			$this->layoutPath = "none";
		}
	
	}

?>