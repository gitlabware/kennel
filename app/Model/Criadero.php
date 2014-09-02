<?php
App::uses('AppModel', 'Model');
/**
 * Criadero Model
 *
 * @property Inscripcioncriadero $Inscripcioncriadero
 * @property Inspeccioncriadero $Inspeccioncriadero
 * @property Kardex $Kardex
 * @property Sucursal $Sucursal
 * @property Departamento $Departamento
 * @property Propietario $Propietario
 * @property Copropietario $Copropietario
 * @property Tipo $Tipo
 * @property Camada $Camada
 * @property Denuncianacimiento $Denuncianacimiento
 * @property Raza $Raza
 */
class Criadero extends AppModel
{


    //The Associations below have been created with all possible keys, those that are not needed can be removed
    /**
     * hasOne associations
     *
     * @var array
     */
    
    public $hasOne = array(
        'Inscripcioncriadero' => array(
            'className' => 'Inscripcioncriadero',
            'foreignKey' => 'criadero_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
        'Inspeccioncriadero' => array(
            'className' => 'Inspeccioncriadero',
            'foreignKey' => 'criadero_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),

        'Kardex' => array(
            'className' => 'Kardex',
            'foreignKey' => 'criadero_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''));

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Sucursale' => array(
            'className' => 'Sucursale',
            'foreignKey' => 'sucursal_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
        'Departamento' => array(
            'className' => 'Departamento',
            'foreignKey' => 'departamento_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
        'Propietario' => array(
            'className' => 'Propietario',
            'foreignKey' => 'propietario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
        'Copropietario' => array(
            'className' => 'Propietario',
            'foreignKey' => 'copropietario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''),
        'Tipo' => array(
            'className' => 'Tipo',
            'foreignKey' => 'tipo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''));

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Camada' => array(
            'className' => 'Camada',
            'foreignKey' => 'criadero_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''),
        'Observacionesinscripcioncriadero' => array(
            'className' => 'Observacionesinscripcioncriadero',
            'foreignKey' => 'criadero_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''),
        'Observacionesinspeccione' => array('className' => 'Observacionesinspeccione',
                'foreignKey' => 'criadero_id'),
        );


    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
    'Raza' => array(
            'className' => 'Raza',
            'joinTable' => 'criaderos_razas',
            'foreignKey' => 'criadero_id',
            'associationForeignKey' => 'raza_id',
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
