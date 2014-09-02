<?php 
App::uses('AppModel', 'Model');
class Mascotastitulo extends AppModel{
    public $useTable = "mascotas_titulos";


    public $belongsTo = array(
	
        'Mascota' => array(
			'className' => 'Mascota',
			'foreignKey' => 'mascota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),
        'Titulo' => array(
			'className' => 'Titulo',
			'foreignKey' => 'titulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),    
   );
}?>