<?php
/**
 * TemporalmascotaFixture
 *
 */
class TemporalmascotaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'kcb' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'raza_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'color' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_nacimiento' => array('type' => 'date', 'null' => true, 'default' => null),
		'sexo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_tatuaje' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'chip' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'kcb_padre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'kcb_madre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nombre_padre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nombre_madre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'categoriaspista_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'criador' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'propietario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ciudad_pais' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'evento_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'kcb' => 'Lorem ipsum dolor sit amet',
			'raza_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'color' => 'Lorem ipsum dolor sit amet',
			'fecha_nacimiento' => '2014-08-28',
			'sexo' => 'Lorem ip',
			'codigo' => 'Lorem ipsum dolor sit amet',
			'num_tatuaje' => 'Lorem ipsum dolor sit amet',
			'chip' => 'Lorem ipsum dolor sit amet',
			'kcb_padre' => 'Lorem ipsum dolor sit amet',
			'kcb_madre' => 'Lorem ipsum dolor sit amet',
			'nombre_padre' => 'Lorem ipsum dolor sit amet',
			'nombre_madre' => 'Lorem ipsum dolor sit amet',
			'categoriaspista_id' => 1,
			'criador' => 'Lorem ipsum dolor sit amet',
			'propietario' => 'Lorem ipsum dolor sit amet',
			'ciudad_pais' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'evento_id' => 1,
			'created' => '2014-08-28'
		),
	);

}
