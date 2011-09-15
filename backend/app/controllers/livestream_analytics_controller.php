<?php
class LivestreamAnalyticsController extends AppController {

	var $name = 'LivestreamAnalytics';
    var $uses = array('LivestreamAnalytic','LivestreamFeed','Configuration');
    var $components = array('WkHtmlToPdf');
    var $helpers = array('Chart');

	function index() {
        if(isset($this->params['form']) && isset($this->params['form']['pdf'])){
            $limit = 1000000;
        } else {
            $limit = 20;
        }
        
 		$this->LivestreamAnalytic->recursive = 0;
        if (($this->data['LivestreamAnalytics']) && ($this->data['LivestreamAnalytics']['start']) && ($this->data['LivestreamAnalytics']['end'])) {
            $startdate = $this->data['LivestreamAnalytics']['start']['year']."-".$this->data['LivestreamAnalytics']['start']['month']."-".$this->data['LivestreamAnalytics']['start']['day'];
            $enddate = $this->data['LivestreamAnalytics']['end']['year']."-".$this->data['LivestreamAnalytics']['end']['month']."-".($this->data['LivestreamAnalytics']['end']['day']+1);
        } else {
            $startdate = date("Y-m-d", strtotime('-1 month')) ;
            $enddate = date("Y-m-d", strtotime('+1 day'));
            $enddatestr = date("Y-m-d", time());
            $this->data['LivestreamAnalytics']['start'] = $startdate;
            $this->data['LivestreamAnalytics']['end'] = $enddatestr;
        }
        
        $this->paginate = array(
            'conditions' => array('LivestreamAnalytic.view_time >=' => $startdate, 'LivestreamAnalytic.view_time <=' => $enddate),
            'fields' => array(
                'LivestreamAnalytic.livestream_feed_id',
                'LivestreamFeed.display_name',
                'COUNT(LivestreamAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => $limit,
            'group' => 'LivestreamAnalytic.livestream_feed_id');
        $livestreamAnalytics = $this->paginate('LivestreamAnalytic');
        $this->set(compact('livestreamAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($livestreamAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['LivestreamFeed']['display_name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;
        
        $this->data['LivestreamAnalytics']['count'] = count($livestreamAnalytics);
        if(isset($this->params['form']) && isset($this->params['form']['pdf'])){
            $startdatestr = date("F, d Y", strtotime($startdate));
            $enddatestr = date("F, d Y",  strtotime($enddate));
            $this->data['LivestreamAnalytics']['start'] = $startdatestr;
            $this->data['LivestreamAnalytics']['end'] = $enddatestr;
            
            $this->layout = "pdf";
            $this->WkHtmlToPdf->createPdf(null,'pdf');
        }
    }
  
    function beforeFilter()
    {
        $this->layout = 'header';
        parent::beforeFilter();
        $this->Auth->allow('pdf_monthly');
        $this->Auth->allow('pdf_weekly');
        $this->Auth->allow('getViewDump');
    }
    function beforeRender(){
        if (($this->action == "pdf_monthly") || ($this->action == "pdf_weekly")) $this->layout = "pdf";
    }
    function pdf_monthly() {
 		$this->LivestreamAnalytic->recursive = 0;
        
        $startdate = date("Y-m-d", strtotime('-1 month')) ;
        $enddate = date("Y-m-d", time());
       
        $this->paginate = array(
            'conditions' => array('LivestreamAnalytic.view_time >=' => $startdate, 'LivestreamAnalytic.view_time <' => $enddate),
            'fields' => array(
                'LivestreamAnalytic.livestream_feed_id',
                'LivestreamFeed.display_name',
                'COUNT(LivestreamAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 10000000,
            'group' => 'LivestreamAnalytic.livestream_feed_id');
        $livestreamAnalytics = $this->paginate('LivestreamAnalytic');
        
        $enddatestr = date("F, d Y",  strtotime('-1 day'));
        $startdatestr = date("F, d Y", strtotime('-1 month'));
        $this->data['LivestreamAnalytics']['end'] = $enddatestr;
        $this->data['LivestreamAnalytics']['start'] = $startdatestr;
        $this->data['LivestreamAnalytics']['count'] = count($livestreamAnalytics);
        
        $this->set(compact('livestreamAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($livestreamAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['LivestreamFeed']['display_name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;

        $this->WkHtmlToPdf->createPdf('LivestreamMonthly.pdf');
	}
    function pdf_weekly() {
 		$this->LivestreamAnalytic->recursive = 0;
        
        $startdate = date("Y-m-d", strtotime('-1 week')) ;
        $enddate = date("Y-m-d", time());
       
        $this->paginate = array(
            'conditions' => array('LivestreamAnalytic.view_time >=' => $startdate, 'LivestreamAnalytic.view_time <' => $enddate),
            'fields' => array(
                'LivestreamAnalytic.livestream_feed_id',
                'LivestreamFeed.display_name',
                'COUNT(LivestreamAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 10000000,
            'group' => 'LivestreamAnalytic.livestream_feed_id');
        $livestreamAnalytics = $this->paginate('LivestreamAnalytic');
        
        $enddatestr = date("F, d Y",  strtotime('-1 day'));
        $startdatestr = date("F, d Y", strtotime('-1 week'));
        $this->data['LivestreamAnalytics']['end'] = $enddatestr;
        $this->data['LivestreamAnalytics']['start'] = $startdatestr;
        $this->data['LivestreamAnalytics']['count'] = count($livestreamAnalytics);
        
        $this->set(compact('livestreamAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($livestreamAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['LivestreamFeed']['display_name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;

        $this->WkHtmlToPdf->createPdf('LivestreamWeekly.pdf');
	}
    
    function getViewDump($fileName) {
        $this->WkHtmlToPdf->getViewDump($fileName);
    }
}

