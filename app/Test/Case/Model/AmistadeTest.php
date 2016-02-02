<?php
App::uses('Amistade', 'Model');

/**
 * Amistade Test Case
 *
 */
class AmistadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.amistade',
		'app.amigo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Amistade = ClassRegistry::init('Amistade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Amistade);

		parent::tearDown();
	}

}
