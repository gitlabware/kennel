<?php
App::uses('AppModel', 'Model');
/**
 * Tarifa Model
 *
 * @property Tramite $Tramite
 * @property Categoriastarifa $Categoriastarifa
 * @property Tipo $Tipo
 * @property Sucursale $Sucursale
 */
class Tarifa extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tramite' => array(
			'className' => 'Tramite',
			'foreignKey' => 'tramite_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Tipo',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sucursale' => array(
			'className' => 'Sucursale',
			'foreignKey' => 'sucursale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
