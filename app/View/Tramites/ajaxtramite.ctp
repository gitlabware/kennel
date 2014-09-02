<?php echo $this->Form->create('Tramite',array('action' => 'guardatramite'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Tipo de Pago</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                
                <?php echo $this->Form->hidden('id');?>
                <h5>Nombre del pago</h5>
                <?php echo $this->Form->text('nombre',array('class' => 'span12','required'))?>
                <h5>Descripcion</h5>
                <?php echo $this->Form->textarea('descripcion',array('class' => 'span12'));?>
                <h5>Categoria</h5>
                <?php echo $this->Form->select('categoriastarifa_id',$categorias,array('class' => 'span12'));?>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
                
  </div>