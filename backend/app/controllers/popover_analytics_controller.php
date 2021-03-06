<?php
class PopoverAnalyticsController extends AppController {

	var $name = 'PopoverAnalytics';
    var $uses = array('PopoverAnalytic','PopoverAd','Configuration');
    var $components = array('WkHtmlToPdf');
    var $helpers = array('Chart');
  
    function beforeFilter() {
        $this->layout = 'header';
        parent::beforeFilter();
        $this->Auth->allow('getViewDump');
    }

	function index() {
        if(isset($this->params['form']) && isset($this->params['form']['pdf'])){
            $limit = 1000000;
        } else {
            $limit = 20;
        }
        
 		$this->PopoverAnalytic->recursive = 0;
        if (($this->data['PopoverAnalytics']) && ($this->data['PopoverAnalytics']['start']) && ($this->data['PopoverAnalytics']['end'])) {
            $startdate = $this->data['PopoverAnalytics']['start']['year']."-".$this->data['PopoverAnalytics']['start']['month']."-".$this->data['PopoverAnalytics']['start']['day'];
            $enddate = $this->data['PopoverAnalytics']['end']['year']."-".$this->data['PopoverAnalytics']['end']['month']."-".($this->data['PopoverAnalytics']['end']['day']+1);
        } else {
            $startdate = date("Y-m-d", strtotime('-1 month')) ;
            $enddate = date("Y-m-d", strtotime('+1 day'));
            $enddatestr = date("Y-m-d", time());
            $this->data['PopoverAnalytics']['start'] = $startdate;
            $this->data['PopoverAnalytics']['end'] = $enddatestr;
        }
        
        $this->paginate = array(
            'conditions' => array('PopoverAnalytic.event_time >=' => $startdate, 'PopoverAnalytic.event_time <=' => $enddate),
            'fields' => array(
                'PopoverAnalytic.popover_ad_id',
                'PopoverAd.name',
                'SUM(IF(PopoverAnalytic.contact_type_id="1",1,0)) AS Count_Views',
                'SUM(IF(PopoverAnalytic.contact_type_id="2",1,0)) AS Count_Clicks'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => $limit,
            'group' => 'PopoverAnalytic.popover_ad_id');
        $popoverAnalytics = $this->paginate('PopoverAnalytic');
        $this->set(compact('popoverAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($popoverAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['PopoverAd']['name'];
                $data[$i]['value'][0] = $Analytic[0]['Count_Views'];
                $data[$i]['value'][1] = $Analytic[0]['Count_Clicks'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;
        
        $this->data['PopoverAnalytics']['count'] = count($popoverAnalytics);
        if(isset($this->params['form']) && isset($this->params['form']['pdf'])){
            $startdatestr = date("F, d Y", strtotime($startdate));
            $enddatestr = date("F, d Y",  strtotime($enddate));
            $this->data['PopoverAnalytics']['start'] = $startdatestr;
            $this->data['PopoverAnalytics']['end'] = $enddatestr;
            
            $this->layout = "pdf";
            $this->WkHtmlToPdf->createPdf(null,'pdf');
        }
    }
    
    function getViewDump($fileName) {
        $this->WkHtmlToPdf->getViewDump($fileName);
    }
}
