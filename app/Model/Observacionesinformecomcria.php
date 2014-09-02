<?php
App::uses('AppModel', 'Model');
/**
 * Observacionesinformecomcria Model
 *
 * @property Infomecomcria $Infomecomcria
 */
class Observacionesinformecomcria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
	'Informecomcria' => array(
			'className' => 'Informecomcria',
			'foreignKey' => 'informecomcria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
 	'Mascota' => array(
			'className' => 'Mascota',
			'foreignKey' => 'mascota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
