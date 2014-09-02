<?php
App::uses('AppModel', 'Model');
/**
 * EventosMascota Model
 *
 * @property Mascota $Mascota
 * @property Evento $Evento
 */
class EventosMascota extends AppModel {


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
            'Ingreso' => array(
			'className' => 'Ingreso',
			'foreignKey' => 'ingreso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Propietario' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietario_id',
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
        'Categoriaspista'=>array(
            'className' => 'Categoriaspista',
			'foreignKey' => 'categoriaspista_id'
        )
	);
}
