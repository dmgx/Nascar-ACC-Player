<?php
class LivestreamAnalytic extends AppModel {
	var $name = 'LivestreamAnalytic';
	var $validate = array(
		'livestream_feed_id' => array(
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
		'LivestreamFeed' => array(
			'className' => 'LivestreamFeed',
			'foreignKey' => 'livestream_feed_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
