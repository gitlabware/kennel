<?php
App::uses('Ingreso', 'Model');

/**
 * Ingreso Test Case
 *
 */
class IngresoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingreso',
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
		'app.tipocobro',
		'app.tipospago',
		'app.tramite',
		'app.costostramite',
		'app.user',
		'app.totalinscritosevento',
		'app.cuentasbancaria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ingreso = ClassRegistry::init('Ingreso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingreso);

		parent::tearDown();
	}

}
