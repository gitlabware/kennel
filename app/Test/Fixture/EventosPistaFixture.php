<?php
/**
 * EventosPistaFixture
 *
 */
class EventosPistaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'evento_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'nombre_pista' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pista_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'hora' => array('type' => 'time', 'null' => false, 'default' => null),
		'juez' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'numero' => array('type' => 'integer', 'null' => true, 'default' => null),
		'numero_especiales' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'numero_absolutos' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'numero_jovenes' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'numero_adultos' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'evento_id' => 1,
			'nombre_pista' => 'Lorem ipsum dolor sit amet',
			'pista_id' => 1,
			'fecha' => '2014-03-05',
			'hora' => '00:59:17',
			'juez' => 'Lorem ipsum dolor sit amet',
			'numero' => 1,
			'numero_especiales' => 1,
			'numero_absolutos' => 1,
			'numero_jovenes' => 1,
			'numero_adultos' => 1
		),
	);

}
