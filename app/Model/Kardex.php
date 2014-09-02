<?php
App::uses('AppModel', 'Model');
/**
 * Kardex Model
 *
 * @property Inscripcioncriadero $Inscripcioncriadero
 * @property Criadero $Criadero
 * @property Mascota $Mascota
 */
class Kardex extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'kardex';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Inscripcioncriadero' => array(
			'className' => 'Inscripcioncriadero',
			'foreignKey' => 'kardex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Criadero' => array(
			'className' => 'Criadero',
			'foreignKey' => 'criadero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Mascota' => array(
			'className' => 'Mascota',
			'foreignKey' => 'mascota_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
