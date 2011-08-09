<?php
class PopoverAnalytic extends AppModel {
	var $name = 'PopoverAnalytic';
	var $validate = array(
		'popover_ad_id' => array(
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
		'PopoverAd' => array(
			'className' => 'PopoverAd',
			'foreignKey' => 'popover_ad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ContactType' => array(
			'className' => 'ContactType',
			'foreignKey' => 'contact_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
