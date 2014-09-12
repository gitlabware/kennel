<?php
App::uses('AppModel', 'Model');
/**
 * Temporalmascota Model
 *
 * @property Raza $Raza
 * @property Categoriaspista $Categoriaspista
 * @property Evento $Evento
 */
class Temporalmascota extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Raza' => array(
			'className' => 'Raza',
			'foreignKey' => 'raza_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Categoriaspista' => array(
			'className' => 'Categoriaspista',
			'foreignKey' => 'categoriaspista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'evento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}