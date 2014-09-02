<?php
App::uses('AppModel', 'Model');
/**
 * Camada Model
 *
 * @property Informecomcria $Informecomcria
 * @property Tipopelo $Tipopelo
 * @property Criadero $Criadero
 * @property Propietario $Propietario
 * @property Raza $Raza
 * @property Variedade $Variedade
 * @property Denuncianacimiento $Denuncianacimiento
 * @property Denunciaservicio $Denunciaservicio
 * @property Criascamada $Criascamada
 */
class Camada extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'camada';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Informecomcria' => array(
			'className' => 'Informecomcria',
			'foreignKey' => 'camada_id',
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
		'Tipospelo' => array(
			'className' => 'Tipospelo',
			'foreignKey' => 'tipospelo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Padre'=>array(
            'className' => 'Mascota',
			'foreignKey' => 'numregistropadre'
        ),
        'Madre'=>array(
            'className' => 'Mascota',
			'foreignKey' => 'numregistromadre'
        ),
		'Criadero' => array(
			'className' => 'Criadero',
			'foreignKey' => 'criadero_id',
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
		'Denuncianacimiento' => array(
			'className' => 'Denuncianacimiento',
			'foreignKey' => 'denuncianacimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Servicio' => array(
			'className' => 'Servicio',
			'foreignKey' => 'servicio_id',
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
        'Mascota' => array(
           'className' => 'Mascota',
		   'foreignKey' => 'camada_id'
        )
	);

}
