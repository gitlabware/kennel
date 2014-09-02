<?php
App::uses('AppModel', 'Model');
 
class Mascotaspropietario extends AppModel{
    public $useTable = "mascotas_propietarios";
    
    public $belongsTo = array(
	   'Propietario'=>array(
            'className' => 'Propietario',
			'foreignKey' => 'propietario_id'
        ),
        'Mascota' => array(
			'className' => 'Mascota',
			'foreignKey' => 'mascota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            )
   );
    	
}
?>