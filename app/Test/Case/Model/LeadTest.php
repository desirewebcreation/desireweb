<?php
App::uses('Lead', 'Model');

/**
 * Lead Test Case
 *
 */
class LeadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lead',
		'app.sources',
		'app.users',
		'app.countries',
		'app.currencies',
		'app.clients',
		'app.campaigns',
		'app.statuses'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lead = ClassRegistry::init('Lead');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lead);

		parent::tearDown();
	}

}
