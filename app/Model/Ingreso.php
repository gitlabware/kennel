<?php
App::uses('AppModel', 'Model');
/**
 * Ingreso Model
 *
 * @property Propietario $Propietario
 * @property Tipocobro $Tipocobro
 * @property Tipospago $Tipospago
 * @property Tramite $Tramite
 * @property Sucursale $Sucursale
 * @property User $User
 * @property Cuentasbancaria $Cuentasbancaria
 */
class Ingreso extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Propietario' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipocobro' => array(
			'className' => 'Tipocobro',
			'foreignKey' => 'tipocobro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipospago' => array(
			'className' => 'Tipospago',
			'foreignKey' => 'tipospago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tramite' => array(
			'className' => 'Tramite',
			'foreignKey' => 'tramite_id',
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
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cuentasbancaria' => array(
			'className' => 'Cuentasbancaria',
			'foreignKey' => 'cuentasbancaria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
