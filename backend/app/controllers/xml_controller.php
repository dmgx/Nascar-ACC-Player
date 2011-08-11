<?php 
/**
 * Test controller for built-in web services in Cake 1.2.x.x
 *
 * @author Chris Hartjes
 *
 */

class XmlController extends AppController
{
    var $name = 'Xml';
    var $components = array('RequestHandler');
    var $uses = array('ArchiveFeed','ArchiveAnalytic',
                      'LivestreamFeed','LivestreamAnalytic',
                      'PrerollAd','PrerollAnalytic',
                      'PopoverAd','PopoverAnalytic',
                      'ContactType','Configuration');
    var $helpers = array('Text', 'Xml');
    
    function beforeFilter() {
        $this->Auth->allow('*');
    }
    function index()
    {
        $this->archivefeed();
        $this->livestreamfeed();
        $this->prerollad();
        $this->popoverad();
        $this->configuration();
    }
    function archivefeed() {
        $args = $this->passedArgs;
        if (($args) && (count($args) > 0)) {
            // get id (if exists) and determine if Archive Feed exists
            $id = $args[0];
            $conditions = array("ArchiveFeed.id" => $id);
            if ($this->ArchiveFeed->find('all', array('conditions' => $conditions))){
                // store call into analytics
                $data = array('ArchiveAnalytic' => array('archive_feed_id' => $id, 'view_time' => DboSource::expression('NOW()')));
                $this->ArchiveAnalytic->create();
                if ($this->ArchiveAnalytic->save($data)) {
                    $this->Session->setFlash(__('The archive analytic has been saved', true));
                } else {
                    $this->Session->setFlash(__('The archive analytic could not be saved. Please, try again.', true));
                }
                $this->set('archiveFeeds',array());
            } else {
                $this->set('archiveFeeds',array());
            }
		} else {
            // retreive Archive Feed data
            $conditions = array("ArchiveFeed.status_id" => 2);
            if (!$this->set('archiveFeeds', $this->ArchiveFeed->find('all', array('conditions' => $conditions)))){
                
            }
        }
        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'xml';
    }
    
    function livestreamfeed() {
        $args = $this->passedArgs;
        if (($args) && (count($args) > 0)) {
            // get id (if exists) and determine if Livestream Feed exists
            $id = $args[0];
            $conditions = array("LivestreamFeed.id" => $id);
            if ($this->LivestreamFeed->find('all', array('conditions' => $conditions))){
                // store call into analytics
                $data = array('LivestreamAnalytic' => array('livestream_feed_id' => $id, 'view_time' => DboSource::expression('NOW()')));
                $this->LivestreamAnalytic->create();
                if ($this->LivestreamAnalytic->save($data)) {
                    $this->Session->setFlash(__('The livestream analytic has been saved', true));
                } else {
                    $this->Session->setFlash(__('The livestream analytic could not be saved. Please, try again.', true));
                }
                $this->set('livestreamFeeds',array());
            } else {
                $this->set('livestreamFeeds',array());
            }
        } else {
            // retreive Livestream Feed data
            $conditions = array("AND" =>
                                array("LivestreamFeed.start_time <=" => date('Y-m-d G:i:s', strtotime("now")) ,
                                      "LivestreamFeed.end_time >=" => date('Y-m-d G:i:s', strtotime("now")),
                                      "LivestreamFeed.status_id" => 2));
            $this->set('livestreamFeeds', $this->LivestreamFeed->find('all', array('conditions' => $conditions)));
        }

        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'xml';
    }
    
    function prerollad() {
        $args = $this->passedArgs;
        if (($args) && (count($args) > 0)) {
            $id = $args[0];
            $conditions = array("PrerollAd.id" => $id);
            if ($this->PrerollAd->find('all', array('conditions' => $conditions))){
                // store call into analytics
                $data = array('PrerollAnalytic' => array('preroll_ad_id' => $id, 'event_time' => DboSource::expression('NOW()')));
                $this->PrerollAnalytic->create();
                if ($this->PrerollAnalytic->save($data)) {
                    $this->Session->setFlash(__('The preroll analytic has been saved', true));
                } else {
                    $this->Session->setFlash(__('The preroll analytic could not be saved. Please, try again.', true));
                }
                $this->set('prerollAds',array());
            } else {
                $this->set('prerollAds',array());
            }
        } else {
            // retreive Preroll Ad data
            $conditions = array("AND" =>
                                array("PrerollAd.start_time <=" => date('Y-m-d G:i:s', strtotime("now")) ,
                                      "PrerollAd.end_time >=" => date('Y-m-d G:i:s', strtotime("now")),
                                      "PrerollAd.status_id" => 2));
            $this->set('prerollAds', $this->PrerollAd->find('all', array('conditions' => $conditions)));
        }

        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'xml';
    }
    
    function popoverad() {
        $args = $this->passedArgs;
        if (($args) && (count($args) > 1)) {
            $id = $args[0];
            $conditions = array("PopoverAd.id" => $id);
            
            $contactType = $args[1];
            $contactconditions = array("ContactType.name" => $contactType);
            $contactTypeRtn = $this->ContactType->find('first', array('conditions' => $contactconditions));
            $contactTypeID = $contactTypeRtn['ContactType']['id'];
            if ($contactTypeID){
                $popovervar = $this->PopoverAd->find('all', array('conditions' => $conditions));
                if ($popovervar){
                    // store call into analytics
                    $data = array('PopoverAnalytic' => array('popover_ad_id' => $id, 'contact_type_id' => $contactTypeID, 'event_time' => DboSource::expression('NOW()')));
                    $this->PopoverAnalytic->create();
                    if ($this->PopoverAnalytic->save($data)) {
                        $this->Session->setFlash(__('The popover analytic has been saved', true));
                    } else {
                        $this->Session->setFlash(__('The popover analytic could not be saved. Please, try again.', true));
                    }
                    $this->set('popoverAds',array());
                } else {
                    $this->set('popoverAds',array());
                }
            } else {
                $this->set('popoverAds',array());
            }
        } else {
            // retreive Popover Ad data
            $conditions = array("AND" =>
                                array("PopoverAd.start_time <=" => date('Y-m-d G:i:s', strtotime("now")) ,
                                      "PopoverAd.end_time >=" => date('Y-m-d G:i:s', strtotime("now")),
                                      "PopoverAd.status_id" => 2));
            $this->set('popoverAds', $this->PopoverAd->find('all', array('conditions' => $conditions)));
        }

        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'xml';
    }
    
    function configuration() {
        // retreive Configuration dataPopove
        $this->set('configuration', $this->Configuration->find('first'));
 
        $this->RequestHandler->respondAs('xml');
        $this->viewPath .= '';
        $this->layoutPath = 'xml';
    }
}
?>