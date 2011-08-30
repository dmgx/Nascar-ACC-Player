<?php 
class TwitterxmlController extends AppController
{
    var $name = 'Twitterxml';
    var $components = array('RequestHandler');
    var $uses = array('Configuration');
    var $helpers = array('Text', 'Xml');
    
    function beforeFilter() {
        $this->Auth->allow('*');
    }
    function index()
    {
        $data = $this->Configuration->find('first');
        $twitterurl = $data['Configuration']['twitter'];
        $xmlstr = file_get_contents($twitterurl);
        $this->set('xmlstr',$xmlstr);
        
        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'none';
        //$this->redirect($twitterurl);
    }
}
