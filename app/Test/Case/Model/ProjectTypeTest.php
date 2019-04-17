<?php
App::uses('ProjectType', 'Model');

/**
 * ProjectType Test Case
 *
 */
class ProjectTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.project_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjectType = ClassRegistry::init('ProjectType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectType);

		parent::tearDown();
	}

}
