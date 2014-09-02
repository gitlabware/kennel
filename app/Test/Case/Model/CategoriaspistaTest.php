<?php
App::uses('Categoriaspista', 'Model');

/**
 * Categoriaspista Test Case
 *
 */
class CategoriaspistaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categoriaspista',
		'app.eventos_mascota',
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
		'app.ingreso',
		'app.tipocobro',
		'app.tipospago',
		'app.tramite',
		'app.categoriastarifa',
		'app.tarifa',
		'app.user',
		'app.totalinscritosevento',
		'app.cuentasbancaria',
		'app.evento',
		'app.eventos_mascotas_puntaje',
		'app.calificacione',
		'app.eventos_pista',
		'app.pista'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categoriaspista = ClassRegistry::init('Categoriaspista');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categoriaspista);

		parent::tearDown();
	}

}
