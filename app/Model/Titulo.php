<?php
App::uses('AppModel', 'Model');
/**
 * Titulo Model
 *
 * @property Mascota $Mascota
 */
class Titulo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Mascota' => array(
			'className' => 'Mascota',
			'joinTable' => 'mascotas_titulos',
			'foreignKey' => 'titulo_id',
			'associationForeignKey' => 'mascota_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
