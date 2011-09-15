<?php
class ConfigurationsController extends AppController {

	var $name = 'Configurations';
    var $helpers = array('Form');
  
    function beforeFilter() {
        $this->layout = 'header';
    }

	function index() {
		$this->set('configuration', $this->Configuration->read(null, 1));
	}

	function edit($id = 1) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid configuration', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The configuration has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Configuration->read(null, 1);
		}
	}
}
