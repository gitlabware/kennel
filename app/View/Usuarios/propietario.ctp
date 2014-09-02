<?php echo $this->Form->create('Usuario',array('action' => 'guardapropietario'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Editar Usuario</h3>
  </div>
  <div class="modal-body">
  <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Nombre Completo</h5>
        <?php echo $this->Form->hidden('Propietario.id');?>
        <?php echo $this->Form->hidden('User.id');?>
        <?php echo $this->Form->text('Propietario.nombre',array('class' => 'span12','required','placeholder' => 'Ingrese el nombre completo'));?>
        </div>
        <div class="span6">
        <h5>C.I.</h5>
        <?php echo $this->Form->text('Propietario.ci',array('class' => 'span12','required','placeholder' => 'Ingrese su numero de cedula'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Direccion</h5>
        <?php echo $this->Form->text('Propietario.direccion',array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <h5>Telefono</h5>
        <?php echo $this->Form->text('Propietario.telefono1',array('class' => 'span12'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Celular</h5>
        <?php echo $this->Form->text('Propietario.celular',array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <h5>Email</h5>
        <?php echo $this->Form->text('Propietario.email1',array('class' => 'span12','required','placeholder' =>'Ingrese el email'));?>
        </div>
        
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6" id="divpass">
        
        <h5><a href="javascript:" onclick="$('#divpass').load('<?php echo $this->Html->url(array('controller' => 'Webs','action' => 'pass'));?>');">Cambiar password</a></h5>
        
        </div>
        <div class="span6">
        </div>
        </div>
        </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
                
  </div>