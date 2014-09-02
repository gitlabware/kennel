<?php
App::uses('AppModel', 'Model');
/**
 * Cuentasbancaria Model
 *
 * @property Sucursale $Sucursale
 */
class Cuentasbancaria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sucursale' => array(
			'className' => 'Sucursale',
			'foreignKey' => 'sucursale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
