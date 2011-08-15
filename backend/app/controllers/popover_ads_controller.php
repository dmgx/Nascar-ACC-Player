<?php
class PopoverAdsController extends AppController {

	var $name = 'PopoverAds';
    var $uses = array('PopoverAd','Configuration');
    var $helpers = array('Html', 'Javascript'); 

	function index() {
		$this->PopoverAd->recursive = 0;
		$this->set('popoverAds', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid popover ad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('popoverAd', $this->PopoverAd->read(null, $id));
	}

	function add() {
        $this->set('configuration', $this->Configuration->find('first'));
        
		if (!empty($this->data)) {
			$this->PopoverAd->create();
			if ($this->PopoverAd->save($this->data)) {
				$this->Session->setFlash(__('The popover ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The popover ad could not be saved. Please, try again.', true));
			}
		}
        $statuses = $this->PopoverAd->Status->find('list'); 
        $this->set('statuses', $statuses ); 
		$adTypes = $this->PopoverAd->AdType->find('list');
		$this->set('adTypes',$adTypes);
	}

	function edit($id = null) {
        $this->set('configuration', $this->Configuration->find('first'));
        
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid popover ad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
            $this->data['PopoverAd']['id'] = $id;
			if ($this->PopoverAd->save($this->data)) {
				$this->Session->setFlash(__('The popover ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The popover ad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PopoverAd->read(null, $id);
			$this->set('popoverAd',$this->data);
		}
        
        $statuses = $this->PopoverAd->Status->find('list'); 
        $this->set('statuses', $statuses ); 
		$adTypes = $this->PopoverAd->AdType->find('list');
		$this->set('adTypes',$adTypes);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for popover ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PopoverAd->delete($id)) {
			$this->Session->setFlash(__('Popover ad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Popover ad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
