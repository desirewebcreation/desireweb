<?php
App::uses('StatusProjectType', 'Model');

/**
 * StatusProjectType Test Case
 *
 */
class StatusProjectTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_project_type',
		'app.lead',
		'app.sources',
		'app.users',
		'app.countries',
		'app.currencies',
		'app.clients',
		'app.user',
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
		$this->StatusProjectType = ClassRegistry::init('StatusProjectType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusProjectType);

		parent::tearDown();
	}

}
