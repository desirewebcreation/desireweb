<?php
App::uses('PortfolioLink', 'Model');

/**
 * PortfolioLink Test Case
 *
 */
class PortfolioLinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.portfolio_link',
		'app.currencies',
		'app.countries',
		'app.clients'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PortfolioLink = ClassRegistry::init('PortfolioLink');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PortfolioLink);

		parent::tearDown();
	}

}
