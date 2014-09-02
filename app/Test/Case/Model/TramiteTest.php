<?php
App::uses('Tramite', 'Model');

/**
 * Tramite Test Case
 *
 */
class TramiteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tramite',
		'app.costostramite'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tramite = ClassRegistry::init('Tramite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tramite);

		parent::tearDown();
	}

}
