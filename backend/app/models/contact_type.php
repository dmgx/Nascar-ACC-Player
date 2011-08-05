<?php
class ContactType extends AppModel {
	var $name = 'ContactType';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'userdefined' => array(
				'rule' => array('userdefined'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'PopoverAnalytic' => array(
			'className' => 'PopoverAnalytic',
			'foreignKey' => 'contact_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PrerollAnalytic' => array(
			'className' => 'PrerollAnalytic',
			'foreignKey' => 'contact_type_id',
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
