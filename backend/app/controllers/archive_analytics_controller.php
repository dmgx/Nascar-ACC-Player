<?php
class ArchiveAnalyticsController extends AppController {

	var $name = 'ArchiveAnalytics';
    var $uses = array('ArchiveAnalytic','ArchiveFeed','Configuration');
    var $components = array('WkHtmlToPdf');
    var $helpers = array('Chart');
       
	function index() {
 		$this->ArchiveAnalytic->recursive = 0;
        if (($this->data['ArchiveAnalytics']) && ($this->data['ArchiveAnalytics']['start']) && ($this->data['ArchiveAnalytics']['end'])) {
            $startdate = $this->data['ArchiveAnalytics']['start']['year']."-".$this->data['ArchiveAnalytics']['start']['month']."-".$this->data['ArchiveAnalytics']['start']['day'];
            $enddate = $this->data['ArchiveAnalytics']['end']['year']."-".$this->data['ArchiveAnalytics']['end']['month']."-".($this->data['ArchiveAnalytics']['end']['day']+1);
        } else {
            $startdate = date("Y-m-d", strtotime('-1 month')) ;
            $enddate = date("Y-m-d", strtotime('+1 day'));
            $enddatestr = date("Y-m-d", time());
            $this->data['ArchiveAnalytics']['start'] = $startdate;
            $this->data['ArchiveAnalytics']['end'] = $enddatestr;
        }
       
        $this->paginate = array(
            'conditions' => array('ArchiveAnalytic.view_time >=' => $startdate, 'ArchiveAnalytic.view_time <=' => $enddate),
            'fields' => array(
                'ArchiveAnalytic.archive_feed_id',
                'ArchiveFeed.name',
                'COUNT(ArchiveAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 20,
            'group' => 'ArchiveAnalytic.archive_feed_id');
        $archiveAnalytics = $this->paginate('ArchiveAnalytic');
        $this->set(compact('archiveAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($archiveAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['ArchiveFeed']['name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;
    }

    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('pdf_monthly');
        $this->Auth->allow('pdf_weekly');
        $this->Auth->allow('getViewDump');
    }
    function beforeRender(){
        if (($this->action == "pdf_monthly") || ($this->action == "pdf_weekly")) $this->layout = "pdf";
    }
    function pdf_monthly() {
 		$this->ArchiveAnalytic->recursive = 0;
        
        $startdate = date("Y-m-d", strtotime('-1 month')) ;
        $enddate = date("Y-m-d", time());
        $wk1date = date("Y-m-d", strtotime('-7 days'));
        $wk2date = date("Y-m-d", strtotime('-14 days'));
        $wk3date = date("Y-m-d", strtotime('-21 days'));
        $wk4date = date("Y-m-d", strtotime('-28 days'));
       
        $this->paginate = array(
            'conditions' => array('ArchiveAnalytic.view_time >=' => $startdate, 'ArchiveAnalytic.view_time <=' => $enddate),
            'fields' => array(
                'ArchiveAnalytic.archive_feed_id',
                'ArchiveFeed.name',
                'COUNT(ArchiveAnalytic.id) AS Count_Views',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$enddate.'" AND ArchiveAnalytic.view_time >"'.$wk1date.'",1,0)) AS wk1',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk1date.'" AND ArchiveAnalytic.view_time >"'.$wk2date.'",1,0)) AS wk2',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk2date.'" AND ArchiveAnalytic.view_time >"'.$wk3date.'",1,0)) AS wk3',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk3date.'" AND ArchiveAnalytic.view_time >"'.$wk4date.'",1,0)) AS wk4',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk4date.'" AND ArchiveAnalytic.view_time >"'.$startdate.'",1,0)) AS wk5'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 10000000,
            'group' => 'ArchiveAnalytic.archive_feed_id');
        $archiveAnalytics = $this->paginate('ArchiveAnalytic');
        
        $enddatestr = date("F, d Y",  strtotime('-1 day'));
        $startdatestr = date("F, d Y", strtotime('-1 month'));
        $wk1datestr = date("m/d", strtotime('-7 days'));
        $wk2datestr = date("m/d", strtotime('-14 days'));
        $wk3datestr = date("m/d", strtotime('-21 days'));
        $wk4datestr = date("m/d", strtotime('-28 days'));
        $wk5datestr = date("m/d", strtotime('-1 month'));
        $this->data['ArchiveAnalytics']['end'] = $enddatestr;
        $this->data['ArchiveAnalytics']['start'] = $startdatestr;
        $this->data['ArchiveAnalytics']['wk1dt'] = $wk1datestr;
        $this->data['ArchiveAnalytics']['wk2dt'] = $wk2datestr;
        $this->data['ArchiveAnalytics']['wk3dt'] = $wk3datestr;
        $this->data['ArchiveAnalytics']['wk4dt'] = $wk4datestr;
        $this->data['ArchiveAnalytics']['wk5dt'] = $wk5datestr;
        $this->data['ArchiveAnalytics']['count'] = count($archiveAnalytics);
        
        $this->set(compact('archiveAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($archiveAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['ArchiveFeed']['name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;

        $this->WkHtmlToPdf->createPdf('ArchiveMonthly.pdf');
	}
    
    function pdf_weekly() {
 		$this->ArchiveAnalytic->recursive = 0;
        
        $startdate = date("Y-m-d", strtotime('-1 week')) ;
        $enddate = date("Y-m-d", time());
        $wk1date = date("Y-m-d", strtotime('-1 day'));
        $wk2date = date("Y-m-d", strtotime('-2 days'));
        $wk3date = date("Y-m-d", strtotime('-3 days'));
        $wk4date = date("Y-m-d", strtotime('-4 days'));
        $wk5date = date("Y-m-d", strtotime('-5 days'));
        $wk6date = date("Y-m-d", strtotime('-6 days'));
       
        $this->paginate = array(
            'conditions' => array('ArchiveAnalytic.view_time >=' => $startdate, 'ArchiveAnalytic.view_time <=' => $enddate),
            'fields' => array(
                'ArchiveAnalytic.archive_feed_id',
                'ArchiveFeed.name',
                'COUNT(ArchiveAnalytic.id) AS Count_Views',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$enddate.'" AND ArchiveAnalytic.view_time >"'.$wk1date.'",1,0)) AS wk1',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk1date.'" AND ArchiveAnalytic.view_time >"'.$wk2date.'",1,0)) AS wk2',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk2date.'" AND ArchiveAnalytic.view_time >"'.$wk3date.'",1,0)) AS wk3',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk3date.'" AND ArchiveAnalytic.view_time >"'.$wk4date.'",1,0)) AS wk4',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk4date.'" AND ArchiveAnalytic.view_time >"'.$wk5date.'",1,0)) AS wk5',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk5date.'" AND ArchiveAnalytic.view_time >"'.$wk6date.'",1,0)) AS wk6',
                'SUM(IF(ArchiveAnalytic.view_time <="'.$wk6date.'" AND ArchiveAnalytic.view_time >"'.$startdate.'",1,0)) AS wk7'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 10000000,
            'group' => 'ArchiveAnalytic.archive_feed_id');
        $archiveAnalytics = $this->paginate('ArchiveAnalytic');
        
        $enddatestr = date("F, d Y", strtotime('-1 day'));
        $startdatestr = date("F, d Y", strtotime('-1 month'));
        $wk1datestr = date("m/d", strtotime('-1 day'));
        $wk2datestr = date("m/d", strtotime('-2 days'));
        $wk3datestr = date("m/d", strtotime('-3 days'));
        $wk4datestr = date("m/d", strtotime('-4 days'));
        $wk5datestr = date("m/d", strtotime('-5 days'));
        $wk6datestr = date("m/d", strtotime('-6 days'));
        $wk7datestr = date("m/d", strtotime('-7 days'));
        $this->data['ArchiveAnalytics']['end'] = $enddatestr;
        $this->data['ArchiveAnalytics']['start'] = $startdatestr;
        $this->data['ArchiveAnalytics']['wk1dt'] = $wk1datestr;
        $this->data['ArchiveAnalytics']['wk2dt'] = $wk2datestr;
        $this->data['ArchiveAnalytics']['wk3dt'] = $wk3datestr;
        $this->data['ArchiveAnalytics']['wk4dt'] = $wk4datestr;
        $this->data['ArchiveAnalytics']['wk5dt'] = $wk5datestr;
        $this->data['ArchiveAnalytics']['wk6dt'] = $wk6datestr;
        $this->data['ArchiveAnalytics']['wk7dt'] = $wk7datestr;
        $this->data['ArchiveAnalytics']['count'] = count($archiveAnalytics);        
        $this->set(compact('archiveAnalytics'));
        
        // Fill Chart data
        $i = 0;
        $data = array();
        foreach ($archiveAnalytics as $Analytic){
            if ($Analytic[0]['Count_Views']>0){
                $data[$i]['title'] = $Analytic['ArchiveFeed']['name'];
                $data[$i]['value'] = $Analytic[0]['Count_Views'];
            }
            $i++;
        }
        $this->data[$this->name]['chartdata'] = $data;

        $this->WkHtmlToPdf->createPdf('ArchiveWeekly.pdf');
	}
    
    function getViewDump($fileName) {
        $this->WkHtmlToPdf->getViewDump($fileName);
    }
}
