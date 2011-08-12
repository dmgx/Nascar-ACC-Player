<?php
class PrerollAnalyticsController extends AppController {

	var $name = 'PrerollAnalytics';
    var $uses = array('PrerollAnalytic','PrerollAd','Configuration');

	function index() {
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
            'limit' => 20,
            'group' => 'PrerollAnalytic.preroll_ad_id');
        $prerollAnalytics = $this->paginate('PrerollAnalytic');
        $this->set(compact('prerollAnalytics'));
    }

}
