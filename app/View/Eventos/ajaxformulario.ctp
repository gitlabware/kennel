
<?php
            echo $this->Form->create('EventosMascota', array('action' => 'ajaxinscritos'));
            ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3><?php echo $mas['Mascota']['nombre_completo']?></h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
	
		<!-- Column -->
  		<div class="span12">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
            <div class="widget-body">
            <h4>Fecha Nacimiento: <?php echo $mas['Mascota']['fecha_nacimiento']?></h4>
            <h4>Edad: <?php echo $this->requestAction(array('controller' => 'Eventos', 'action' => 'meses',$mas['Mascota']['fecha_nacimiento'],$fecha1));?> meses</h4>
            <h4>Sexo: <?php echo $mas['Mascota']['sexo']?></h4>
            <h5>Seleccione la Categoria</h5>
                
                <?php echo $this->Form->select('EventosMascota.categoriaspista_id',$catepistas,array('required','class' => 'span12'));?>
				<h5>Nro de Comprobante</h5>
                <?php echo $this->Form->text('Ingreso.comprobante',array('required','class' => 'span12'));?>
            </div>
				<!-- Widget heading -->
				
	       </div>
			<!-- // Widget END -->
            
		</div>
		<!-- // Column END -->
	</div>
  </div>
  
  <div class="modal-footer">
    <?php echo $this->Form->hidden('EventosMascota.mascota_id',array('value' => $mas['Mascota']['id']));?>
            <?php echo $this->Form->hidden('EventosMascota.raza_id',array('value' => $mas['Mascota']['raza_id']));?>
            <?php echo $this->Form->hidden('EventosMascota.propietario_id',array('value' => $mas['Mascota']['propietarioactual_id']));?>
            <?php
                echo $this->Js->submit('Guardar', array('url' => array('controller' => 'Eventos','action' => 'ajaxinscritos',$idEvento), 
                'update' => '#inscritos',
                //'before' => '',
                'complete' => '$("#myModal").modal("toggle"); document.getElementById("inscritosini").scrollIntoView(true);',
                'id' => 'boton'));
                echo $this->Form->end();
            ?>
                
  </div>