<?php
class AdTypesController extends AppController {

	var $name = 'AdTypes';

	function index() {
		$this->AdType->recursive = 0;
		$this->set('adTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid ad type', true), array('action' => 'index'));
		}
		$this->set('adType', $this->AdType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AdType->create();
			if ($this->AdType->save($this->data)) {
				$this->flash(__('Adtype saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid ad type', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AdType->save($this->data)) {
				$this->flash(__('The ad type has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid ad type', true)), array('action' => 'index'));
		}
		if ($this->AdType->delete($id)) {
			$this->flash(__('Ad type deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Ad type was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
