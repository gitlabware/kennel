<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.propietario',
		'app.tipo',
		'app.criadero',
		'app.sucursale',
		'app.departamento',
		'app.camada',
		'app.tipospelo',
		'app.mascota',
		'app.raza',
		'app.criaderos_raza',
		'app.grupo',
		'app.grupos_raza',
		'app.kardex',
		'app.inscripcioncriadero',
		'app.titulo',
		'app.mascotas_titulo',
		'app.mascotas_propietario',
		'app.denuncianacimiento',
		'app.servicio',
		'app.monta',
		'app.informecomcria',
		'app.observacionesinformecomcria',
		'app.inspeccioncriadero',
		'app.instalacione',
		'app.condicioneshigienica',
		'app.condicionejemplare',
		'app.recomendacione',
		'app.observacionesinscripcioncriadero',
		'app.observacionesinspeccione',
		'app.totalinscritosevento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
