<?php
class WeeklyEmailListsController extends AppController {

	var $name = 'WeeklyEmailLists';

	function index() {
		$this->WeeklyEmailList->recursive = 0;
		$this->set('weeklyEmailLists', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid weekly email list', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('weeklyEmailList', $this->WeeklyEmailList->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->WeeklyEmailList->create();
			if ($this->WeeklyEmailList->save($this->data)) {
				$this->Session->setFlash(__('The weekly email list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The weekly email list could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid weekly email list', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WeeklyEmailList->save($this->data)) {
				$this->Session->setFlash(__('The weekly email list has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The weekly email list could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WeeklyEmailList->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for weekly email list', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WeeklyEmailList->delete($id)) {
			$this->Session->setFlash(__('Weekly email list deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Weekly email list was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
