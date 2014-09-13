<?php
/**
 * CategoriaspistaFixture
 *
 */
class CategoriaspistaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'desde' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'hasta' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'desde' => 1,
			'hasta' => 1,
			'tipo' => 'Lorem ipsum dolor sit amet'
		),
	);

}
