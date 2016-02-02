<?php
App::uses('PerfilesSociale', 'Model');

/**
 * PerfilesSociale Test Case
 *
 */
class PerfilesSocialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.perfiles_sociale',
		'app.cliente_social'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PerfilesSociale = ClassRegistry::init('PerfilesSociale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PerfilesSociale);

		parent::tearDown();
	}

}
