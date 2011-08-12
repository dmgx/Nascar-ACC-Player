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
}
