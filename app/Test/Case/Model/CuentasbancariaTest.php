<?php
App::uses('Cuentasbancaria', 'Model');

/**
 * Cuentasbancaria Test Case
 *
 */
class CuentasbancariaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cuentasbancaria',
		'app.sucursale',
		'app.departamento',
		'app.camada',
		'app.tipospelo',
		'app.mascota',
		'app.raza',
		'app.criadero',
		'app.propietario',
		'app.tipo',
		'app.mascotas_propietario',
		'app.inscripcioncriadero',
		'app.kardex',
		'app.inspeccioncriadero',
		'app.instalacione',
		'app.condicioneshigienica',
		'app.condicionejemplare',
		'app.recomendacione',
		'app.observacionesinscripcioncriadero',
		'app.observacionesinspeccione',
		'app.criaderos_raza',
		'app.grupo',
		'app.grupos_raza',
		'app.titulo',
		'app.mascotas_titulo',
		'app.denuncianacimiento',
		'app.servicio',
		'app.monta',
		'app.informecomcria',
		'app.observacionesinformecomcria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cuentasbancaria = ClassRegistry::init('Cuentasbancaria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cuentasbancaria);

		parent::tearDown();
	}

}
