

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3><?php echo $mas['Mascota']['nombre_completo']?></h3>
  </div>
  
  <div class="modal-body">
      <?php
            echo $this->Form->create('Evento', array('action' => 'ajaxinscribe_inicial/'.$idEvento));
            ?>
    <div class="row-fluid">
	
		<!-- Column -->
  		<div class="span12">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
            <div class="widget-body">
            <h4>Fecha Nacimiento: <?php echo $mas['Mascota']['fecha_nacimiento']?></h4>
            <h4>Edad: <?php echo $this->requestAction(array('controller' => 'Eventos', 'action' => 'meses',$mas['Mascota']['fecha_nacimiento'],date('Y-m-d')));?> meses</h4>
            <h4>Sexo: <?php echo $mas['Mascota']['sexo']?></h4>
            <h5>Seleccione la Categoria</h5>
                
                <?php echo $this->Form->select('EventosMascota.categoriaspista_id',$catepistas,array('required','placeholder' => 'Ingrese Nombre de la Raza','class' => 'span12 '));?>
            <h5>Seleccione la Sucursal para la Inscripcion</h5>
            <?php echo $this->Form->select('Ingreso.sucursale_id',$sucursales,array('class' => 'span12'));?>
				<!--<h5>Numero de Catalogo</h5>-->
                <?php //echo $this->Form->text('EventosMascota.catalogo',array('required','placeholder' => 'Ingrese Nombre de la Raza','class' => 'span12'));?>
            </div>
				<!-- Widget heading -->
				
	       </div>
			<!-- // Widget END -->
            
		</div>
		<!-- // Column END -->
	</div>
      <div class="row-fluid">
          <div class="span12">
              <?php echo $this->Form->hidden('EventosMascota.mascota_id',array('value' => $mas['Mascota']['id']));?>
            <?php echo $this->Form->hidden('EventosMascota.raza_id',array('value' => $mas['Mascota']['raza_id']));?>
            <?php echo $this->Form->hidden('EventosMascota.propietario_id',array('value' => $mas['Mascota']['propietarioactual_id']));?>
            <?php
            echo $this->Form->submit('Enviar',array('class' => 'btn btn-block btn-success'));
                /*echo $this->Js->submit('Guardar', array('url' => array('controller' => 'Eventos','action' => 'ajaxinscribe_usuario',$idEvento), 
                'update' => '#mimodal',
                'before' => "$('#imgcargando').toggle();$('#mimodal').toggle();",
                'complete' => "$('#imgcargando').toggle(100);$('#mimodal').toggle();",
                ));
                */
            ?>
          </div>
      </div>
      <?php echo $this->Form->end();?>
  </div>
  
    