<?php
class PrerollAnalyticsController extends AppController {

	var $name = 'PrerollAnalytics';
    var $uses = array('PrerollAnalytic','PrerollAd','Configuration');
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
        
 		$this->PrerollAnalytic->recursive = 0;
        if (($this->data['PrerollAnalytics']) && ($this->data['PrerollAnalytics']['start']) && ($this->data['PrerollAnalytics']['end'])) {
            $startdate = $this->data['PrerollAnalytics']['start']['year']."-".$this->data['PrerollAnalytics']['start']['month']."-".$this->data['PrerollAnalytics']['start']['day'];
            $enddate = $this->data['PrerollAnalytics']['end']['year']."-".$this->data['PrerollAnalytics']['end']['month']."-".($this->data['PrerollAnalytics']['end']['day']+1);
        } else {
            $startdate = date("Y-m-d", strtotime('-1 month')) ;
            $enddate = date("Y-m-d", strtotime('+1 day'));
            $enddatestr = date("Y-m-d", time());
            $this->data['PrerollAnalytics']['start'] = $startdate;
            $this->data['PrerollAnalytics']['end'] = $enddatestr;
        }
        
        $this->paginate = array(
            'conditions' => array('PrerollAnalytic.event_time >=' => $startdate, 'PrerollAnalytic.event_time <=' => $enddate),
            'fields' => array(
                'PrerollAnalytic.preroll_ad_id',
                'PrerollAd.name',
                'COUNT(PrerollAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => $limit,
            'group' => 'PrerollAnalytic.preroll_ad_id');
        $prerollAnalytics = $this->paginate('PrerollAnalytic');
        $this->set(compact('prerollAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($prerollAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['PrerollAd']['name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;
        
        $this->data['PrerollAnalytics']['count'] = count($prerollAnalytics);
        if(isset($this->params['form']) && isset($this->params['form']['pdf'])){
            $startdatestr = date("F, d Y", strtotime($startdate));
            $enddatestr = date("F, d Y",  strtotime($enddate));
            $this->data['PrerollAnalytics']['start'] = $startdatestr;
            $this->data['PrerollAnalytics']['end'] = $enddatestr;
            
            $this->layout = "pdf";
            $this->WkHtmlToPdf->createPdf(null,'pdf');
        }
    }
    
    function getViewDump($fileName) {
        $this->WkHtmlToPdf->getViewDump($fileName);
    }
}
