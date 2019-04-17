<?php
App::uses('MasterDoc', 'Model');

/**
 * MasterDoc Test Case
 *
 */
class MasterDocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.master_doc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MasterDoc = ClassRegistry::init('MasterDoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MasterDoc);

		parent::tearDown();
	}

}
