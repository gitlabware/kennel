<?php
App::uses('AppModel', 'Model');
/**
 * Servicio Model
 *
 * @property Propietario $Propietario
 * @property Mascota $Mascota
 */
class Servicio extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
        'Monta'=>array(
           'className' => 'Monta',
	       'foreignKey' => 'monta_id',
           ),
        'Propietarioreproductora' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietarioreproductora_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),
        'Propietarioreproductor' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietarioreproductor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),
  
         'Reproductora' => array(
			'className' => 'Mascota',
			'foreignKey' => 'reproductora_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),
         'Reproductor' => array(
			'className' => 'Mascota',
			'foreignKey' => 'reproductor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),   
        
	);

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Denuncianacimiento' => array(
			'className' => 'Denuncianacimiento',
			'foreignKey' => 'servicio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Camada' => array(
			'className' => 'Camada',
			'foreignKey' => 'servicio_id',
			'conditions' => '',
			'fields' => '',
			'order' => '')
        
  );

}