<?php
/**
 * IngresoFixture
 *
 */
class IngresoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'propietario_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'monto' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'monto_total' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2'),
		'comprobante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tipocobro_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tipospago_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tramite_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'glosa' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sucursale_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cuentasbancaria_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'nacional' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'propietario_id' => 1,
			'monto' => 1,
			'monto_total' => 1,
			'comprobante' => 'Lorem ipsum dolor sit amet',
			'tipocobro_id' => 1,
			'tipospago_id' => 1,
			'tramite_id' => 1,
			'glosa' => 'Lorem ipsum dolor sit amet',
			'sucursale_id' => 1,
			'user_id' => 1,
			'cuentasbancaria_id' => 1,
			'nacional' => 1,
			'created' => '2014-03-05 23:25:29'
		),
	);

}
