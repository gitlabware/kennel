<?php
/**
 * TarifaFixture
 *
 */
class TarifaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tramite_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'monto_total' => array('type' => 'float', 'null' => true, 'default' => null),
		'nacionalregional' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1),
		'nacional' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'regional' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'categoriastarifa_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'gestion' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tipo_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sucursale_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'tramite_id' => 1,
			'monto_total' => 1,
			'nacionalregional' => 1,
			'nacional' => 1,
			'regional' => 1,
			'categoriastarifa_id' => 1,
			'gestion' => 1,
			'tipo_id' => 1,
			'sucursale_id' => 1
		),
	);

}
