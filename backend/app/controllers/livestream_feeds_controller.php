<?php
class LivestreamFeedsController extends AppController {

	var $name = 'LivestreamFeeds';

	function index() {
		$this->LivestreamFeed->recursive = 0;
		$this->set('livestreamFeeds', $this->paginate());
    }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid livestream feed', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('livestreamFeed', $this->LivestreamFeed->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LivestreamFeed->create();
			if ($this->LivestreamFeed->save($this->data)) {
				$this->Session->setFlash(__('The livestream feed has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The livestream feed could not be saved. Please, try again.', true));
			}
		}
        $statuses = $this->LivestreamFeed->Status->find('list'); 
        $this->set('statuses', $statuses ); 
        $left_icons = $this->LivestreamFeed->LeftIcon->find('list'); 
        $this->set('left_icons', $left_icons ); 
        $right_icons = $this->LivestreamFeed->RightIcon->find('list'); 
        $this->set('right_icons', $right_icons ); 
        $categories = $this->LivestreamFeed->Category->find('list'); 
        $this->set('categories', $categories ); 
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid livestream feed', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->LivestreamFeed->save($this->data)) {
				$this->Session->setFlash(__('The livestream feed has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The livestream feed could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LivestreamFeed->read(null, $id);
		}
        $statuses = $this->LivestreamFeed->Status->find('list'); 
        $this->set('statuses', $statuses ); 
        $left_icons = $this->LivestreamFeed->LeftIcon->find('list'); 
        $this->set('left_icons', $left_icons ); 
        $right_icons = $this->LivestreamFeed->RightIcon->find('list'); 
        $this->set('right_icons', $right_icons ); 
        $categories = $this->LivestreamFeed->Category->find('list'); 
        $this->set('categories', $categories ); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for livestream feed', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LivestreamFeed->delete($id)) {
			$this->Session->setFlash(__('Livestream feed deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Livestream feed was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
