<?php
App::uses('AppModel', 'Model');
/**
 * EventosPista Model
 *
 * @property Evento $Evento
 * @property Pista $Pista
 * @property Categoriaspista $Categoriaspista
 * @property Mascota $Mascota
 */
class EventosPista extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'evento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pista' => array(
			'className' => 'Pista',
			'foreignKey' => 'pista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	

}
