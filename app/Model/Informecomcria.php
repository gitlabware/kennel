<?php
App::uses('AppModel', 'Model');
/**
 * Informecomcria Model
 *
 * @property Camada $Camada
 * @property Denuncianacimiento $Denuncianacimiento
 */
class Informecomcria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Camada' => array(
			'className' => 'Camada',
			'foreignKey' => 'camada_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Denuncianacimiento' => array(
			'className' => 'Denuncianacimiento',
			'foreignKey' => 'denuncianacimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public $hasMany = array(
    'Observacionesinformecomcria' => array(
			'className' => 'Observacionesinformecomcria',
			'foreignKey' => 'informecomcria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );
}
