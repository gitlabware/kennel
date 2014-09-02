<?php echo $this->Form->create('Grupo',array('action' => 'guardagrupo'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Grupo</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                <h5>Nombre del Grupo</h5>
                <?php echo $this->Form->hidden('id');?>
                <?php echo $this->Form->text('nombre', array('required','class' => 'span12','placeholder' => 'Nombre del Grupo')); ?>
                <?php echo $this->Form->text('descripcion', array('required','class' => 'span12','placeholder' => 'Inserte una Descripcion')); ?>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
  </div>