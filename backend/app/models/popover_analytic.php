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
			'foreignKey' => false,
			'conditions' => array('PopoverAnalytic.popover_ad_id = PopoverAd.id'),
			'fields' => '',
			'order' => ''
		),
		'ContactType' => array(
			'className' => 'ContactType',
			'foreignKey' => false,
			'conditions' => array('PopoverAnalytic.contact_type_id = ContactType.id'),
			'fields' => '',
			'order' => ''
		)
	);
}
