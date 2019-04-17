<?php
/**
 * LeadProjectTypeFixture
 *
 */
class LeadProjectTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'leads_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'project_types_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'leads_id' => array('column' => 'leads_id', 'unique' => 0),
			'project_types_id' => array('column' => 'project_types_id', 'unique' => 0)
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
			'leads_id' => 1,
			'project_types_id' => 1,
			'created' => '2015-06-06 13:51:10',
			'modified' => '2015-06-06 13:51:10'
		),
	);

}
