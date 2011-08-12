<?php
class LivestreamAnalyticsController extends AppController {

	var $name = 'LivestreamAnalytics';
    var $uses = array('LivestreamAnalytic','LivestreamFeed','Configuration');

	function index() {
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
                'LivestreamFeed.name',
                'COUNT(LivestreamAnalytic.id) AS Count_Views'
                ),
            'order' => array('Count_Views' => 'desc'),
            'limit' => 20,
            'group' => 'LivestreamAnalytic.livestream_feed_id');
        $livestreamAnalytics = $this->paginate('LivestreamAnalytic');
        $this->set(compact('livestreamAnalytics'));
    }
}

