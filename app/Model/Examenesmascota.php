<?php
App::uses('AppModel', 'Model');
 
class Examenesmascota extends AppModel{
    public $useTable = "examenes_mascotas";
    
    public $belongsTo = array(
	   'Examene'=>array(
            'className' => 'Examene',
			'foreignKey' => 'examene_id'
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