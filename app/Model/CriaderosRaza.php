<?php
App::uses('AppModel', 'Model');
/**
 * CriaderosRaza Model
 *
 * @property Criadero $Criadero
 * @property Raza $Raza
 */
class CriaderosRaza extends AppModel {


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
		'Raza' => array(
			'className' => 'Raza',
			'foreignKey' => 'raza_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
