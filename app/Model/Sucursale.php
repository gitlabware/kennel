<?php
App::uses('AppModel', 'Model');
/**
 * Sucursale Model
 *
 * @property Departamento $Departamento
 */
class Sucursale extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    
    public $validate = array(
        'nombre' => array(
            'limitDuplicates' => array(
                'rule' => array('limitDuplicates', 1),
                'message' => 'Ya existe'
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Es Necesario ingresar el Nombre'
            )
        ),
        'cuenta' => array(
            'rule' => array('notEmpty'),
            'message' => 'Es Necesario ingresar la cuenta'
        ),
        'departamento_id' => array(
            'rule' => array('notEmpty'),
            'message' => 'Es necesario indicar el Departamento'
        )
    );
    
    public function limitDuplicates($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        if(!empty($this->data['Sucursale']['id']))
        {
            $check['Sucursale.id !='] = $this->data['Sucursale']['id'];
        }
        $existingPromoCount = $this->find('count', array(
            'conditions' => $check,
            'recursive' => -1
        ));
        return $existingPromoCount < $limit;
    }
    
    
	public $belongsTo = array(
		'Departamento' => array(
			'className' => 'Departamento',
			'foreignKey' => 'departamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
