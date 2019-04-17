<?php
App::uses('LeadProjectType', 'Model');

/**
 * LeadProjectType Test Case
 *
 */
class LeadProjectTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lead_project_type',
		'app.leads',
		'app.project_types'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LeadProjectType = ClassRegistry::init('LeadProjectType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LeadProjectType);

		parent::tearDown();
	}

}
