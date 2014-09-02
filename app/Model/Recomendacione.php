<?php
App::uses('AppModel', 'Model');
/**
 * Recomendacione Model
 *
 * @property Inspeccioncriadero $Inspeccioncriadero
 */
class Recomendacione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Inspeccioncriadero' => array(
			'className' => 'Inspeccioncriadero',
			'foreignKey' => 'inspeccioncriadero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
