<?php
class ArchiveFeedsController extends AppController {

	var $name = 'ArchiveFeeds';

	function index() {
		$this->ArchiveFeed->recursive = 0;
		$this->set('archiveFeeds', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid archive feed', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('archiveFeed', $this->ArchiveFeed->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ArchiveFeed->create();
			if ($this->ArchiveFeed->save($this->data)) {
				$this->Session->setFlash(__('The archive feed has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive feed could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid archive feed', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ArchiveFeed->save($this->data)) {
				$this->Session->setFlash(__('The archive feed has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive feed could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ArchiveFeed->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for archive feed', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ArchiveFeed->delete($id)) {
			$this->Session->setFlash(__('Archive feed deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Archive feed was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}
