<?php
class LivestreamFeed extends AppModel {
	var $name = 'LivestreamFeed';
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
		'left_icon_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'right_icon_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
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
			'conditions' => array('LivestreamFeed.status_id = Status.id'),
			'fields' => '',
			'order' => ''
		),
		'LeftIcon' => array(
			'className' => 'TeamIcon',
			'foreignKey' => false,
			'conditions' => array('LivestreamFeed.left_icon_id = LeftIcon.id'),
			'fields' => '',
			'order' => ''
		),
		'RightIcon' => array(
			'className' => 'TeamIcon',
			'foreignKey' => false,
			'conditions' => array('LivestreamFeed.right_icon_id = RightIcon.id'),
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => false,
			'conditions' => array('LivestreamFeed.category_id = Category.id'),
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'LivestreamAnalytic' => array(
			'className' => 'LivestreamAnalytic',
			'foreignKey' => 'livestream_feed_id',
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

    function beforeSave($created) {
        $Configuration = ClassRegistry::init('Configuration');
        $configuration = $Configuration->find('first');

        extract($this->data['LivestreamFeed']['thumbnail_url']);
        $dest = $configuration['Configuration']['thumbnail_url_path'];
        if ($size && !$error && $name) {
            $t0 = move_uploaded_file($tmp_name, $dest.$name);
            $this->data['LivestreamFeed']['thumbnail_url'] = $name;
        }
        
        extract($this->data['LivestreamFeed']['background']);
        $dest = $configuration['Configuration']['background_url_path'];
        if ($size && !$error && $name) {
            $t0 = move_uploaded_file($tmp_name, $dest.$name);
            $this->data['LivestreamFeed']['background'] = $name;
        }
        return true;
    } 

}
