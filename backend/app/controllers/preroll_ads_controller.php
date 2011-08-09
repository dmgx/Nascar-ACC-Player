<?php
class PrerollAdsController extends AppController {

	var $name = 'PrerollAds';

	function index() {
		$this->PrerollAd->recursive = 0;
		$this->set('prerollAds', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid preroll ad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('prerollAd', $this->PrerollAd->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PrerollAd->create();
			if ($this->PrerollAd->save($this->data)) {
				$this->Session->setFlash(__('The preroll ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The preroll ad could not be saved. Please, try again.', true));
			}
		}
        $statuses = $this->PrerollAd->Status->find('list'); 
        $this->set('statuses', $statuses ); 
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid preroll ad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PrerollAd->save($this->data)) {
				$this->Session->setFlash(__('The preroll ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The preroll ad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PrerollAd->read(null, $id);
		}
        $statuses = $this->PrerollAd->Status->find('list'); 
        $this->set('statuses', $statuses ); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for preroll ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PrerollAd->delete($id)) {
			$this->Session->setFlash(__('Preroll ad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Preroll ad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
