<?php echo $this->Form->create('Evento',array('action' => 'guardaevento'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Editar Evento</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                
                <?php echo $this->Form->hidden('id');?>
                <h5>Nombre</h5>
                <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Nombre del Evento')); ?>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Desde</h5>
                <?php echo $this->Form->date('fecha_inicio', array('required','class' => 'span12')); ?>
                </div>
                <div class="span6">
                <h5>Hasta</h5>
                <?php echo $this->Form->date('fecha_fin', array('required','class' => 'span12')); ?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Hora</h5>
                <?php echo $this->Form->text('hora', array('placeholder'=>'HH:mm','required','class' => 'span12')); ?>
                </div>
                <div class="span6">
                <h5>Ciudad</h5>
                <?php 
                        //echo $this->Form->text('hora', array('id' => 'time', 'type' => 'time', 'class' => 'required', 'data-date-relative' => 'now'));
                        $departamentos = array(
                        'La Paz' => 'La Paz',
                        'Cochabamba' => 'Cochabamba',
                        'Santa Cruz' => 'Santa Cruz',
                        'Oruro' => 'Oruro',
                        'Potosi' => 'Potosi',
                        'Tarija' => 'Tarija',
                        'Pando' => 'Pando',
                        'Beni' => 'Beni',
                        'Sucre' => 'Sucre'
                        );  
                        echo $this->Form->select('ciudad', $departamentos,array('class' => 'selectpicker span6' ,'data-style' => 'btn-primary','required'));
                    ?> 
                </div>
                
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Direccion</h5>
                <?php echo $this->Form->text('direccion', array('required','placeholder' => 'Direccion del Evento','class' => 'span12')); ?>
                </div>
                <div class="span6">
                <h5>Circuito</h5>
                <?php echo $this->Form->checkbox('circuito',array('class' => 'checkbox span12','id' => 'agree')); ?>
                </div>
                </div>
                </div>
                
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
                
  </div>