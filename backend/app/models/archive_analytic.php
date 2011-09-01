<?php
class ArchiveAnalytic extends AppModel {
	var $name = 'ArchiveAnalytic';
	var $validate = array(
		'archive_feed_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ArchiveFeed' => array(
			'className' => 'ArchiveFeed',
			'foreignKey' => false,
			'conditions' => array('ArchiveAnalytic.archive_feed_id = ArchiveFeed.id'),
			'fields' => '',
			'order' => ''
		)
	);
    function findByDateRange($start,$end){
        return $this->find('all',array('view_time >= '.$start,'view_time >= '.$end));
    }
    
    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$parameters = compact('conditions', 'recursive');
 
		if (isset($extra['group'])) {
			$parameters['fields'] = $extra['group'];
 
			if (is_string($parameters['fields'])) {
				// pagination with single GROUP BY field
				if (substr($parameters['fields'], 0, 9) != 'DISTINCT ') {
					$parameters['fields'] = 'DISTINCT ' . $parameters['fields'];
				}
				unset($extra['group']);
				$count = $this->find('count', array_merge($parameters, $extra));
			} else {
				// resort to inefficient method for multiple GROUP BY fields
				$count = $this->find('count', array_merge($parameters, $extra));
				$count = $this->getAffectedRows();
			}
		} else {
			// regular pagination
			$count = $this->find('count', array_merge($parameters, $extra));
		}
		return $count;
	} 

}