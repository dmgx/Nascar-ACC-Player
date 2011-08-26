<?php 

class EmailController extends AppController
{
    var $name = 'Email';
    var $components = array('Email');
    var $uses = array('WeeklyEmailList','MonthlyEmailList','Configuration');
    
    function beforeFilter() {
        $this->layout = 'header';
        $this->Auth->allow('*');
    }
    function index()
    {
        
    }

    function sendWeeklyMail() { 
        //$this->Email->delivery = 'debug';
        
        $this->requestAction('/archive_analytics/pdf_weekly');
        $this->requestAction('/livestream_analytics/pdf_weekly');

        $Configuration = $this->Configuration->find('first');
        $EmailList = $this->WeeklyEmailList->find('all');
        foreach ($EmailList as $Email) {
            $this->Email->to = $Email['WeeklyEmailList']['email']; 
            $this->Email->subject = 'Weekly Nascar ACC Player View Report'; 
            $this->Email->from = $Configuration['Configuration']['sender_email_address'];
            
            $this->Email->attachments = array(
                TMP . 'LivestreamWeekly.pdf',
                TMP . 'ArchiveWeekly.pdf'
                );

            $body = 'This email has the weekly report pdf file attached.';
            if ($this->Email->send($body) ) { 
                $this->Session->setFlash('Weekly email sent'); 
            } else { 
                $this->Session->setFlash('Weekly email not sent'); 
            }
        }
    } 

    function sendMonthlyMail() { 
        //$this->Email->delivery = 'debug';
        
        $this->requestAction('/archive_analytics/pdf_monthly');
        $this->requestAction('/livestream_analytics/pdf_monthly');

        $Configuration = $this->Configuration->find('first');
        $EmailList = $this->MonthlyEmailList->find('all');
        foreach ($EmailList as $Email) {
            $this->Email->to = $Email['MonthlyEmailList']['email']; 
            $this->Email->subject = 'Monthly Nascar ACC Player View Report'; 
            $this->Email->from = $Configuration['Configuration']['sender_email_address']; 
            
            $this->Email->attachments = array(
                TMP . 'LivestreamMonthly.pdf',
                TMP . 'ArchiveMonthly.pdf'
                );

            $body = 'This email has the monthly report pdf file attached.';
            if ($this->Email->send($body) ) { 
                $this->Session->setFlash('Monthly email sent'); 
            } else { 
                $this->Session->setFlash('Monthly email not sent'); 
            }
        }
    } 
}
?>