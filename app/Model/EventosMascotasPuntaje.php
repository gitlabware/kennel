<?php
App::uses('AppModel', 'Model');
/**
 * EventosMascotasPuntaje Model
 *
 * @property Mascota $Mascota
 * @property Raza $Raza
 * @property Categoriaspista $Categoriaspista
 * @property Evento $Evento
 * @property Eventosmascota $Eventosmascota
 * @property Eventospista $Eventospista
 * @property Grupo $Grupo
 */
class EventosMascotasPuntaje extends AppModel {


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
		),
		'Raza' => array(
			'className' => 'Raza',
			'foreignKey' => 'raza_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Calificacione' => array(
			'className' => 'Calificacione',
			'foreignKey' => 'calificacione_id',
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
		),
		'EventosMascota' => array(
			'className' => 'EventosMascota',
			'foreignKey' => 'eventosmascota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EventosPista' => array(
			'className' => 'EventosPista',
			'foreignKey' => 'eventospista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grupo' => array(
			'className' => 'Grupo',
			'foreignKey' => 'grupo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
