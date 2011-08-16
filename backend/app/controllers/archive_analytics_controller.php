<?php
class ArchiveAnalyticsController extends AppController {

	var $name = 'ArchiveAnalytics';
    var $uses = array('ArchiveAnalytic','ArchiveFeed','Configuration');
    //var $helpers = array('Pdf');

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
    	//the sample code to be pasted into the controller of your choice
    function pdf() {
        $this->layout = 'pdf'; //this will use the pdf.thtml layout 
        $this->set('data','hello world!'); 
        $this->render(); 
        $t0 = 0;
	}
}
