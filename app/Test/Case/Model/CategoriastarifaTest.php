<?php
App::uses('Categoriastarifa', 'Model');

/**
 * Categoriastarifa Test Case
 *
 */
class CategoriastarifaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categoriastarifa',
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
		$this->Categoriastarifa = ClassRegistry::init('Categoriastarifa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categoriastarifa);

		parent::tearDown();
	}

}
