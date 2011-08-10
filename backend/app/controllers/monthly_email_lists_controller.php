<?php
class MonthlyEmailListsController extends AppController {

	var $name = 'MonthlyEmailLists';

	function index() {
		$this->MonthlyEmailList->recursive = 0;
		$this->set('monthlyEmailLists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid monthly email list', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('monthlyEmailList', $this->MonthlyEmailList->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MonthlyEmailList->create();
			if ($this->MonthlyEmailList->save($this->data)) {
				$this->Session->setFlash(__('The monthly email list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The monthly email list could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid monthly email list', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MonthlyEmailList->save($this->data)) {
				$this->Session->setFlash(__('The monthly email list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The monthly email list could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MonthlyEmailList->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for monthly email list', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MonthlyEmailList->delete($id)) {
			$this->Session->setFlash(__('Monthly email list deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Monthly email list was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
