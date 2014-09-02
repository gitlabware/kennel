<?php
App::uses('AppModel', 'Model');
/**
 * Inscripcioncriadero Model
 *
 * @property Criadero $Criadero
 * @property Inspeccioncriadero $Inspeccioncriadero
 * @property Kardex $Kardex
 * @property Observacionesinscripcioncriadero $Observacionesinscripcioncriadero
 */
class Inscripcioncriadero extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		),
	
		'Kardex' => array(
			'className' => 'Kardex',
			'foreignKey' => 'kardex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);



}
