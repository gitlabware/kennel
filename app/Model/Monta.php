<?php
App::uses('AppModel', 'Model');
/**
 * Monta Model
 *
 * @property Kardex $Kardex
 * @property Raza $Raza
 * @property Propietario $Propietario
 * @property Reproductora $Reproductora
 * @property Titulo $Titulo
 */
class Monta extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasOne associations
 *
 * @var array
 */
public $hasOne = array(
   'Servicio'=>array(
      'className'=>'Servicio',
      'foreingKey'=>'monta_id'
   )
);
/**
 * belongsTo associations
 *
 * @var array
 */
	
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

}
