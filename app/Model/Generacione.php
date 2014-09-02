<?php
App::uses('AppModel', 'Model');
/**
 * Generacione Model
 *
 * @property Mascota $Mascota
 */
class Generacione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Mascota' => array(
			'className' => 'Mascota',
			'foreignKey' => 'mascota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
