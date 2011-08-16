<?php
class PrerollAnalytic extends AppModel {
	var $name = 'PrerollAnalytic';
	var $validate = array(
		'preroll_ad_id' => array(
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
		'PrerollAd' => array(
			'className' => 'PrerollAd',
			'foreignKey' => false,
			'conditions' => array('PrerollAnalytic.preroll_ad_id = PrerollAd.id'),
			'fields' => '',
			'order' => ''
		)
	);
}