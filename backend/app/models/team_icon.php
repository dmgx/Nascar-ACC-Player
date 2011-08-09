<?php
class TeamIcon extends AppModel {
	var $name = 'TeamIcon';
	var $displayField = 'name';

	var $hasMany = array(
		'ArchiveFeed' => array(
			'className' => 'ArchiveFeed',
			'foreignKey' => 'left_icon_id',
            'associationForeignKey' => 'right_icon_id',
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
        'LivestreamFeed' => array(
			'className' => 'LivestreamFeed',
			'foreignKey' => 'left_icon_id',
            'associationForeignKey' => 'right_icon_id',
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
