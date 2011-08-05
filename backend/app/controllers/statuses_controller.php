<?php
class StatusesController extends AppController {

	var $name = 'Statuses';

	function index() {
		$this->Status->recursive = 0;
		$this->set('statuses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid status', true), array('action' => 'index'));
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Status->create();
			if ($this->Status->save($this->data)) {
				$this->flash(__('Status saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid status', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Status->save($this->data)) {
				$this->flash(__('The status has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Status->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid status', true)), array('action' => 'index'));
		}
		if ($this->Status->delete($id)) {
			$this->flash(__('Status deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Status was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
