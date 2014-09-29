<?php echo $this->Form->create('User',array('action' => 'guardausuario'));?>
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Usuario</h3>
  </div>
  
  <div class="modal-body">
  <div class="row-fluid">
  <div class="span12">
  <h5>Nombre Completo</h5>
  <?php echo $this->Form->text('nombre',array('class' => 'span12','placeholder' => 'Ingrese su nombre completo','required'));?>
  </div>
  </div>
  <div class="row-fluid">
  <div class="span12">
  <div class="span6">
  <h5>Usuario</h5>
  <?php echo $this->Form->hidden('id');?>
  <?php echo $this->Form->text('username',array('class' => 'span12','placeholder' => 'Ingrese su nombre de usuario','required'));?>
  </div>
  <div class="span6" id="divpass">
  <?php if(empty($idUsuario)):?>
  <h5>Password</h5>
  <?php echo $this->Form->password('password',array('class' => 'span12','placeholder' => 'Ingrese su password','required'));?>
  <?php else:?>
  <h5><a href="javascript:" onclick="$('#divpass').load('<?php echo $this->Html->url(array('controller' => 'Webs','action' => 'pass'));?>');">Cambiar password</a></h5>
  <?php endif;?>
  </div>
  </div>
  </div>
  <div class="row-fluid">
  <div class="span12">
  <div class="span6">
  <h5>Sucursal</h5>
  <?php echo $this->Form->select('sucursale_id',$sucursales,array('class' => 'span12','required'));?>
  </div>
  <div class="span6">
  <?php if($this->Session->read('Auth.User.role') == 'administrador'):?>
  <h5>Tipo de Usuario</h5>
  <?php echo $this->Form->select('role',array('administrador' => 'Administrador','regional' => 'Regional'),array('class' => 'span12','required'));?>
  <?php endif;?>
  </div>
  </div>
  </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
                
  </div>