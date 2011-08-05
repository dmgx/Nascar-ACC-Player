<?php
/* PopoverAnalytic Fixture generated on: 2011-08-03 23:16:15 : 1312413375 */
class PopoverAnalyticFixture extends CakeTestFixture {
	var $name = 'PopoverAnalytic';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'popover_ad_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'event_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'contact_type_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'popover_ad_id' => array('column' => 'popover_ad_id', 'unique' => 0), 'contact_type_id' => array('column' => 'contact_type_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'popover_ad_id' => 1,
			'event_time' => '2011-08-03 23:16:15',
			'contact_type_id' => 'Lor'
		),
	);
}
