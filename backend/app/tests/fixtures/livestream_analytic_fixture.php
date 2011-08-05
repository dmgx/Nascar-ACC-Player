<?php
/* LivestreamAnalytic Fixture generated on: 2011-08-03 23:11:05 : 1312413065 */
class LivestreamAnalyticFixture extends CakeTestFixture {
	var $name = 'LivestreamAnalytic';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'livestream_feed_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'view_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'livestream_feed_id' => array('column' => 'livestream_feed_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'livestream_feed_id' => 1,
			'view_time' => '2011-08-03 23:11:04'
		),
	);
}
