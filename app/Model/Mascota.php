<?php
App::uses('AppModel', 'Model');
/**
 * Mascota Model
 *
 * @property Kardex $Kardex
 * @property Raza $Raza
 * @property Propietario $Propietario
 * @property Reproductora $Reproductora
 * @property Titulo $Titulo
 */
class Mascota extends AppModel {
    
    public $validate = array(
        'nombre' =>array(
            
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Es Necesario ingresar el Nombre'
            )
        ),'nombre_completo' =>array(
            
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre no puede estar vacio'
            )
        ),
        'kcb' => array(
            'limitDuplicateskcb' => array(
                'rule' => array('limitDuplicateskcb', 1),
                'message' => 'El kcb utilizado ya existe'
            )
        ),
        'codigo' => array(
            'limitDuplicatescodigo' => array(
                'rule' => array('limitDuplicatescodigo', 1),
                'message' => 'El codigo ya existe, revise si esta registrado!!'
            )
        ),'raza_id' =>array(
            
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Es necesario seleccionar la Raza'
            )
        ),'sexo' =>array(
            
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Es necesario seleccionar el sexo de la mascota'
            )
        )/*,'fecha_nacimiento' =>array(
            
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Es necesario ingresar la Fecha de Nacimiento'
            )
        ),*/
    );
    
    public function limitDuplicateskcb($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        if(!empty($check['kcb']) && $check['kcb'] != 'nulo')
        {
            if(!empty($this->data['Mascota']['id']))
            {
                $check['Mascota.id !='] = $this->data['Mascota']['id'];
            }
            $existingPromoCount = $this->find('count', array(
                'conditions' => $check,
                'recursive' => -1
            ));
            return $existingPromoCount < $limit;
        }
        else{
            return TRUE;
        }
        
    }
    
    public function limitDuplicatescodigo($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        if(!empty($check['codigo']))
        {
            
            if(!empty($this->data['Mascota']['id']))
            {
                $check['Mascota.id !='] = $this->data['Mascota']['id'];
            }
            $existingPromoCount = $this->find('count', array(
                'conditions' => $check,
                'recursive' => -1
            ));
            return $existingPromoCount < $limit;
        }
        else{
            return TRUE;
        }
    }


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
        'Departamento' => array(
			'className' => 'Departamento',
			'foreignKey' => 'departamento_id',
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
        'Propietarioactual' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietarioactual_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
        'Kardex' => array(
			'className' => 'Kardex',
			'foreignKey' => 'kardex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		), 
        'Camada' => array(
            'className'=> 'Camada',
            'foreignKey' => 'camada_id'
        ), 
        'Criadero' => array(
			'className' => 'Criadero',
			'foreignKey' => 'criadero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Titulo' => array(
			'className' => 'Titulo',
			'joinTable' => 'mascotas_titulos',
			'foreignKey' => 'mascota_id',
			'associationForeignKey' => 'titulo_id',
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
        'Propietario' => array(
			'className' => 'Propietario',
			'joinTable' => 'mascotas_propietarios',
			'foreignKey' => 'mascota_id',
			'associationForeignKey' => 'propietario_id',
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
