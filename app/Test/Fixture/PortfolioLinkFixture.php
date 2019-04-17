<?php
/**
 * PortfolioLinkFixture
 *
 */
class PortfolioLinkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tags' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tools_used' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'for' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'live_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'work_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'url' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'currencies_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'countries_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'clients_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'nibiru_rating' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'live_on' => array('type' => 'date', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'currencies_id' => array('column' => 'currencies_id', 'unique' => 0),
			'FK_sales_docs_users' => array('column' => 'created_by', 'unique' => 0),
			'FK_sales_docs_users_2' => array('column' => 'modified_by', 'unique' => 0),
			'FK_sales_docs_master_docs' => array('column' => 'live_on', 'unique' => 0),
			'FK_portfolio_links_clients' => array('column' => 'clients_id', 'unique' => 0),
			'FK_portfolio_links_countries' => array('column' => 'countries_id', 'unique' => 0)
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
			'title' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'description' => 'Lorem ipsum dolor sit amet',
			'tags' => 'Lorem ipsum dolor sit amet',
			'tools_used' => 'Lorem ipsum dolor sit amet',
			'for' => 'Lorem ipsum dolor sit amet',
			'live_status' => 'Lorem ipsum dolor sit amet',
			'work_type' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet',
			'currencies_id' => 1,
			'price' => 1,
			'countries_id' => 1,
			'clients_id' => 1,
			'nibiru_rating' => 1,
			'live_on' => '2015-09-18',
			'created' => '2015-09-18 15:01:39',
			'modified' => '2015-09-18 15:01:39',
			'created_by' => 1,
			'modified_by' => 1
		),
	);

}
