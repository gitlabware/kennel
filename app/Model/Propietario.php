<?php
App::uses('AppModel', 'Model');
/**
 * Propietario Model
 *
 * @property Criadero $Criadero
 * @property Criadero $Criadero
 * @property Tipo $Tipo
 * @property Camada $Camada
 * @property Denunciaservicio $Denunciaservicio
 * @property Mascota $Mascota
 */
class Propietario extends AppModel
{

    public $validate = array(
        'nombre' => array(
            'limitDuplicates' => array(
                'rule' => array('limitDuplicates', 1),
                'message' => 'Ya existe un propietario con ese nombre!!'
            )
        )
    );
    
    public function limitDuplicates($check, $limit) {
        
            if(!empty($this->data['Propietario']['id']))
            {
                $idp = $this->data['Propietario']['id'];
                $check['Propietario.id !='] = $idp;
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
    'Tipo' => array(
            'className' => 'Tipo',
            'foreignKey' => 'tipo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
    'Criadero'=>array(
            'className' => 'Criadero',
            'foreignKey' => 'criadero_id',
        )
            );

    /*public $hasOne = array('Criadero' => array(
            'className' => 'Criadero',
            'foreignKey' => 'criadero_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''));*/

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array('Mascota' => array(
            'className' => 'Mascota',
            'joinTable' => 'mascotas_propietarios',
            'foreignKey' => 'propietario_id',
            'associationForeignKey' => 'mascota_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''));

}
