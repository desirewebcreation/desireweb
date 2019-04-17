<?php
/**
 * StatusProjectTypeFixture
 *
 */
class StatusProjectTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'lead_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'source_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'FK__sources' => array('column' => 'source_id', 'unique' => 0),
			'FK_status_project_types_leads' => array('column' => 'lead_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'lead_id' => 1,
			'source_id' => 1,
			'created' => '2015-06-24 15:47:45',
			'modifed' => '2015-06-24 15:47:45'
		),
	);

}
