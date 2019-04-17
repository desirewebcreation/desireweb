<?php
App::uses('SalesDoc', 'Model');

/**
 * SalesDoc Test Case
 *
 */
class SalesDocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sales_doc',
		'app.currencies',
		'app.master_docs'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SalesDoc = ClassRegistry::init('SalesDoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SalesDoc);

		parent::tearDown();
	}

}
