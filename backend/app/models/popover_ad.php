<?php
class PopoverAd extends AppModel {
	var $name = 'PopoverAd';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ad_type_id' => array(
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
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => false,
			'conditions' => array('PopoverAd.status_id = Status.id'),
			'fields' => '',
			'order' => ''
		),
		'AdType' => array(
			'className' => 'AdType',
			'foreignKey' => false,
			'conditions' => array('PopoverAd.ad_type_id = AdType.id'),
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'PopoverAnalytic' => array(
			'className' => 'PopoverAnalytic',
			'foreignKey' => 'popover_ad_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}