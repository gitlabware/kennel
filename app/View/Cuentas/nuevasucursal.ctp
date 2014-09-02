<?php echo $this->Form->create('Cuenta',array('action' => 'guardasucursal'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Sucursal</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
		<div class="widget-body">
                    <div class="row-fluid">
                        <div class="row-fluid">
                            <?php echo $this->Form->hidden('Sucursale.id');?>
                            <h5>Nombre</h5>
                            <?php echo $this->Form->text('Sucursale.nombre',array('class' => 'span12','required'));?>  
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <h5>Direccion</h5>
                            <?php echo $this->Form->text('Sucursale.direccion',array('class' => 'span12','required'));?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Telefono</h5>
                                <?php echo $this->Form->text('Sucursale.telefono',array('class' => 'span12','required'));?>
                            </div>
                            <div class="span6">
                                <h5>Departamento</h5>
                                <?php echo $this->Form->select('Sucursale.departamento_id',$departamentos,array('class' => 'span12','required'));?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <h5>Cuenta</h5>
                            <?php echo $this->Form->text('Sucursale.cuenta',array('class' => 'span12','required'))?>
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