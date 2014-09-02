<?php echo $this->Form->create('Cuenta',array('action' => 'guardaexamen'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Examen</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                <?php echo $this->Form->hidden('Examene.id');?>
                <h5>Descripcion del examen</h5>
                <?php echo $this->Form->text('Examene.descripcion',array('class' => 'span12','required'));?>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
  </div>