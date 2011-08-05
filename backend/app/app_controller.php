<?php 



class AppController extends Controller { 

    var $helpers = array('Session', 'Html', 'Form', 'Javascript'); 
    var $components = array('Auth', 'Cookie', 'Session');

    function beforeFilter() {
        $this->Auth->userModel = 'User';
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');

    } 
} 



?> 

