<?php
App::uses('AppModel', 'Model');
/**
 * Denuncianacimiento Model
 *
 * @property Camada $Camada
 * @property Denunciaservicio $Denunciaservicio
 * @property Informecomcria $Informecomcria
 * @property Criadero $Criadero
 */
class Denuncianacimiento extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Camada' => array(
			'className' => 'Camada',
			'foreignKey' => 'denuncianacimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Informecomcria' => array(
			'className' => 'Informecomcria',
			'foreignKey' => 'denuncianacimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
        'Servicio'=>array(
            'className' => 'Servicio',
			'foreignKey' => 'servicio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        )
	);
}
