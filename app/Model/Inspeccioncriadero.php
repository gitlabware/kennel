<?php
App::uses('AppModel', 'Model');
/**
 * Inspeccioncriadero Model
 *
 * @property Inscripcioncriadero $Inscripcioncriadero
 * @property Criadero $Criadero
 * @property Instalacion $Instalacion
 * @property Condicioneshigienica $Condicioneshigienica
 * @property Condicionejemplare $Condicionejemplare
 * @property Recomendacione $Recomendacione
 */
class Inspeccioncriadero extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Inscripcioncriadero' => array(
			'className' => 'Inscripcioncriadero',
			'foreignKey' => 'inspeccioncriadero_id',
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
		'Instalacione' => array(
			'className' => 'Instalacione',
			'foreignKey' => 'instalacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Condicioneshigienica' => array(
			'className' => 'Condicioneshigienica',
			'foreignKey' => 'condicioneshigienica_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Condicionejemplare' => array(
			'className' => 'Condicionejemplare',
			'foreignKey' => 'condicionejemplare_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recomendacione' => array(
			'className' => 'Recomendacione',
			'foreignKey' => 'inspeccioncriadero_id',
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
