<?php
App::uses('AppModel', 'Model');
/**
 * Raza Model
 *
 * @property Camada $Camada
 * @property Mascota $Mascota
 * @property Criadero $Criadero
 */
class Raza extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
 
    public $virtualFields = array(
    'nombre_completo' => 'CONCAT(Raza.nombre, " ", Raza.descripcion)'
);
	public $hasMany = array(
		'Camada' => array(
			'className' => 'Camada',
			'foreignKey' => 'raza_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Criadero' => array(
			'className' => 'Criadero',
			'joinTable' => 'criaderos_razas',
			'foreignKey' => 'raza_id',
			'associationForeignKey' => 'criadero_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
        'Grupo' => array(
            'className' => 'Grupo',
			'joinTable' => 'grupos_razas',
			'foreignKey' => 'raza_id',
			'associationForeignKey' => 'grupo_id',
			'unique' => 'keepExisting'
        )
	);

}
?>