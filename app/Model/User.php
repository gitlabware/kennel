<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Propietario $Propietario
 * @property Sucursale $Sucursale
 * @property Totalinscritosevento $Totalinscritosevento
 */
class User extends AppModel {

    public function beforeSave($options = array())
    {
        if(!empty($this->data['User']['password']))
        {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        
        return true;
    }
    
    
    public $validate = array(
        'username' => array(
            'limitDuplicates' => array(
                'rule' => array('limitDuplicates',1)
                ,'message' => 'EL nombre de usuario ya existe!!!!'
            )
        )
    );
    
    public function limitDuplicates($check, $limit) {
        
            if(!empty($this->data['User']['id']))
            {
                $id = $this->data['User']['id'];
                $check['User.id !='] = $id;
            }
            $existingPromoCount = $this->find('count', array(
                'conditions' => $check,
                'recursive' => -1
            ));
            return $existingPromoCount < $limit;
        
    }
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Propietario' => array(
			'className' => 'Propietario',
			'foreignKey' => 'propietario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sucursale' => array(
			'className' => 'Sucursale',
			'foreignKey' => 'sucursale_id',
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
		'Totalinscritosevento' => array(
			'className' => 'Totalinscritosevento',
			'foreignKey' => 'user_id',
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

}
