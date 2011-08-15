<?php 



class AppController extends Controller { 

    var $helpers = array('Session', 'Html', 'Form', 'Javascript'); 
    var $components = array('Auth', 'Cookie', 'Session');

    function beforeFilter() {
        $this->Auth->userModel = 'User';
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => '');
    } 
} 
/**
 * Populates the view with variables required for foreign key fields
 * 
 * @param $models array	list of models to fetch lookups for
 * 						if empty, the list automatically populated with the associated models
 * 
 * @return none			view vars are set for each associated model
 */
function _populateLookups($models = array()) {
 
	if (empty($models)) {
 
		// build a list of all associated models:
 
		// create a reference to the Controllers root model
		// this is the first item in the controllers $uses array
		// or the default if $uses is empty
		$rootModel = $this->{$this->modelClass};
 
		// build list of belongsTo Models
		foreach($rootModel->belongsTo as $model=>$attr) {
 
			$models[] = $model;
 
		}
 
		// build list of hasAndBelongsToMany Models
		foreach($rootModel->hasAndBelongsToMany as $model=>$attr) {
 
			$models[] = $model;
 
		}
 
	}
 
	// populate the view vars with the lookup lists for each associated model
	foreach($models as $model) {
 
		// calculate the name of the variable to populate based on the model name
		$name = Inflector::variable(Inflector::pluralize($model)); 
 
		// populate the view var
		$this->set($name, $rootModel->{$model}->find("list"));
 
	}
 
}
/**
 * Runs before the view is rendered
 * @see cake/libs/controller/Controller#beforeRender()
 */
function beforeRender() {
 
	switch($this->action) {
 
		case "add":
		case "edit":
 
			$this->_populateLookups();
			break;
 
	}
 
}

?>