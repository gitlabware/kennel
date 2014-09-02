<?php echo $this->Form->create('Usuario',array('action' => 'guardafoto','id' => 'formufoto','enctype' => 'multipart/form-data'),array('type' => 'file'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Cambiar Foto</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
        <?php echo $this->Form->hidden('Mascota.id',array('value' => $idMascota));?>
        <div class="row-fluid">
				<div class="span6">
					<h4 class="separator bottom">Subir una foto del ejemplar</h4>
					<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
					  	<div class="input-append">
					    	<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-default btn-file"><span class="fileupload-new">Seleccione la foto</span><span class="fileupload-exists">Cambiar</span><?php echo $this->Form->file('Mascota.foto',array('class' =>'margin-none'));?></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
					  	</div>
					</div>
				</div>
		</div>        
        <div class="row-fluid">
    	<div class="span12">
        <a href="#" class="thumbnail"><?php echo $this->Html->image(''.$imagen,array('style' => 'width: 250px; height: 250px;'));?></a>
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