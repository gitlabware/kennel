<?php
App::uses('EventosPista', 'Model');

/**
 * EventosPista Test Case
 *
 */
class EventosPistaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.eventos_pista',
		'app.evento',
		'app.inscripcionesevento',
		'app.totalinscritosevento',
		'app.mascota',
		'app.raza',
		'app.camada',
		'app.tipospelo',
		'app.criadero',
		'app.sucursale',
		'app.departamento',
		'app.denuncianacimiento',
		'app.servicio',
		'app.monta',
		'app.propietario',
		'app.tipo',
		'app.mascotas_propietario',
		'app.informecomcria',
		'app.observacionesinformecomcria',
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
		'app.eventos_mascota',
		'app.pista',
		'app.categoriaspista',
		'app.categoriaspistas_eventos_pista',
		'app.eventos_pistas_mascota'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventosPista = ClassRegistry::init('EventosPista');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventosPista);

		parent::tearDown();
	}

}
