<?php
App::uses('AppModel', 'Model');
/**
 * Tramite Model
 *
 * @property Categoriastarifa $Categoriastarifa
 * @property Ingreso $Ingreso
 * @property Tarifa $Tarifa
 */
class Tramite extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Categoriastarifa' => array(
			'className' => 'Categoriastarifa',
			'foreignKey' => 'categoriastarifa_id',
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
		'Ingreso' => array(
			'className' => 'Ingreso',
			'foreignKey' => 'tramite_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tarifa' => array(
			'className' => 'Tarifa',
			'foreignKey' => 'tramite_id',
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
