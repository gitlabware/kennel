<?php
App::uses('AppModel', 'Model');
class Grupo extends AppModel{
    public $hasAndBelongsToMany = array(
    'Raza' => array(
            'className' => 'Raza',
            'joinTable' => 'grupos_razas',
            'foreignKey' => 'grupo_id',
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
?>