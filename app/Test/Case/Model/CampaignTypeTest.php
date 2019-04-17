<?php
App::uses('CampaignType', 'Model');

/**
 * CampaignType Test Case
 *
 */
class CampaignTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.campaign_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CampaignType = ClassRegistry::init('CampaignType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CampaignType);

		parent::tearDown();
	}

}
