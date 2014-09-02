<?php echo $this->Form->create('Cuenta',array('action' => 'guardacuentab'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Cuenta Bancaria</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                <?php echo $this->Form->hidden('Cuentasbancaria.id');?>
                <h5>Cuenta</h5>
                <?php echo $this->Form->text('Cuentasbancaria.cuenta',array('class' => 'span12','required'));?>
                <h5>Sucursal</h5>
                <?php echo $this->Form->select('Cuentasbancaria.sucursale_id',$sucursales,array('class' => 'span12','required'));?>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
  </div>