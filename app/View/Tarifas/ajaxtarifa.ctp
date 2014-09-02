<?php echo $this->Form->create('Tarifa',array('action' => 'guardatarifa'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Tarifa</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                
                <?php echo $this->Form->hidden('id');?>
                <h5>Tramite</h5>
                <?php echo $this->Form->select('tramite_id',$tramites,array('class' => 'span12','required'))?>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Lugar</h5>
                <?php echo $this->Form->select('sucursale_id',$sucursales,array('class' => 'span12','required'));?>
                </div>
                <div class="span6">
                <h5>Monto Total</h5>
                <?php echo $this->Form->text('monto_total',array('class' => 'span12','required'))?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Monto en Nacional</h5>
                <?php echo $this->Form->text('nacional',array('class' => 'span12', 'required'));?>
                </div>
                <div class="span6">
                <h5>Monto en Regional</h5>
                <?php echo $this->Form->text('regional',array('class' => 'span12', 'required'));?>
                </div>
                
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Gestion</h5>
                <?php echo $this->Form->text('gestion',array('class' => 'span12','required'));?>
                </div>
                <div class="span6">
                <h5>Tipo</h5>
                <?php echo $this->Form->select('tipo_id',$tipos,array('class' => 'span12','required'));?>
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