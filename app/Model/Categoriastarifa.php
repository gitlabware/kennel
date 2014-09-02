<?php
App::uses('AppModel', 'Model');
/**
 * Categoriastarifa Model
 *
 * @property Tramite $Tramite
 */
class Categoriastarifa extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Tramite' => array(
			'className' => 'Tramite',
			'foreignKey' => 'categoriastarifa_id',
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
