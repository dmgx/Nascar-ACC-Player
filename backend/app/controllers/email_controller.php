<?php 
/**
 * Test controller for built-in web services in Cake 1.2.x.x
 *
 * @author Chris Hartjes
 *
 */

class EmailController extends AppController
{
    var $name = 'Email';
    var $components = array('Email');
    var $uses = array('WeeklyEmailList','MonthlyEmailList','Configuration');
    
    function beforeFilter() {
        $this->Auth->allow('*');
    }
    function index()
    {
        
    }

    /** 
     * Send a text string as email body 
     */ 
    function sendWeeklyMail() { 
        //$this->Email->delivery = 'debug';

        $Configuration = $this->Configuration->find('first');
        $EmailList = $this->WeeklyEmailList->find('all');
        foreach ($EmailList as $Email) {
            $this->Email->to = $Email['WeeklyEmailList']['email']; 
            $this->Email->subject = 'Weekly Nascar ACC Player View Report'; 
            $this->Email->from = $Configuration['Configuration']['sender_email_address']; 
            
            $t0 = TMP;
            $this->Email->attachments = array(
                TMP . 'foo.doc',
                'bar.doc' => TMP . 'some-temp-name'
                );

            $body = 'This email has the weekly report pdf file attached.';
            if ($this->Email->send($body) ) { 
                $this->Session->setFlash('Simple email sent'); 
            } else { 
                $this->Session->setFlash('Simple email not sent'); 
            }
        }
    } 
    /** 
     * Send a text string as email body 
     */ 
    function sendMonthlyMail() { 
        //$this->Email->delivery = 'debug';

        $Configuration = $this->Configuration->find('first');
        $EmailList = $this->MonthlyEmailList->find('all');
        foreach ($EmailList as $Email) {
            $this->Email->to = $Email['MonthlyEmailList']['email']; 
            $this->Email->subject = 'Monthly Nascar ACC Player View Report'; 
            $this->Email->from = $Configuration['Configuration']['sender_email_address']; 
            
            //$this->Email->attachments = array(
            //    TMP . 'foo.doc',
            //    'bar.doc' => TMP . 'some-temp-name'
            //    );

            $body = 'This email has the monthly report pdf file attached.';
            if ($this->Email->send($body) ) { 
                $this->Session->setFlash('Simple email sent'); 
            } else { 
                $this->Session->setFlash('Simple email not sent'); 
            }
        }
    } 
}
?>