<?php
App::uses('Temporalmascota', 'Model');

/**
 * Temporalmascota Test Case
 *
 */
class TemporalmascotaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.temporalmascota',
		'app.raza',
		'app.camada',
		'app.tipospelo',
		'app.mascota',
		'app.departamento',
		'app.criadero',
		'app.sucursale',
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
		'app.denuncianacimiento',
		'app.servicio',
		'app.monta',
		'app.informecomcria',
		'app.observacionesinformecomcria',
		'app.titulo',
		'app.mascotas_titulo',
		'app.grupo',
		'app.grupos_raza',
		'app.categoriaspista',
		'app.evento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Temporalmascota = ClassRegistry::init('Temporalmascota');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Temporalmascota);

		parent::tearDown();
	}

}
