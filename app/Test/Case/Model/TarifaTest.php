<?php
App::uses('Tarifa', 'Model');

/**
 * Tarifa Test Case
 *
 */
class TarifaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarifa',
		'app.tramite',
		'app.costostramite',
		'app.categoriastarifa',
		'app.tipo',
		'app.sucursale',
		'app.departamento',
		'app.camada',
		'app.tipospelo',
		'app.mascota',
		'app.raza',
		'app.criadero',
		'app.propietario',
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
		$this->Tarifa = ClassRegistry::init('Tarifa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tarifa);

		parent::tearDown();
	}

}
