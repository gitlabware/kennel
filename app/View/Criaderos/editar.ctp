<?php echo $this->Form->create('Criadero');?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Criadero</h3>
  </div>
  
  <div class="modal-body">
  <!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
            <div class="row-fluid">
            <div class="span12">
            <h5>Propietario (prueba)</h5>
            <?php //echo $this->Form->select('propietario_id',$propietarios,array('class' => 'span12','required'));?>
            <div id="divselectpropajax">
            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Criadero.propietario_id','divselectpropajax'));?>');"><?php echo $this->request->data['Propietario']['nombre']?> </a>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <h5>Copropieario</h5>
            <?php //echo $this->Form->select('copropietario_id',$propietarios,array('class' => 'span12'));?>
            <div id="divselectcopropajax">
            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Criadero.copropietario_id','divselectcopropajax'));?>');"><?php echo $this->request->data['Copropietario']['nombre']?> </a>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span8">
            <h5>Direcci&oacute;n Criadero</h5>
            <?php echo $this->Form->text('direccion', array('placeholder' => 'Direccion del Criadero','class' => 'span12')) ?>
            </div>
            <div class="span4">
            <h5>Departamento</h5>
            <?php echo $this->Form->select('departamento_id', $departamentos, array('placeholder' => 'Nombre Completo','class' => 'span12')) ?>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Telefonos fijos 1</h5>
            <?php echo $this->Form->text('telefono1', array('placeholder' => 'Numero de telefono','class' => 'span12')) ?>
            </div>
            <div class="span6">
            <h5>Telefonos fijos 2</h5>
            <?php echo $this->Form->text('telefono2', array('placeholder' => 'Numero de telefono','class' => 'span12')) ?>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Celular 1</h5>
            <?php echo $this->Form->text('celular1', array('placeholder' => 'Numero de Celular','class' => 'span12')) ?>
            </div>
            <div class="span6">
            <h5>Celular 2</h5>
            <?php echo $this->Form->text('celular2', array('placeholder' => 'Numero de Celular','class' => 'span12')) ?>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Email 1</h5>
            <?php echo $this->Form->text('email1', array('placeholder' => 'Correo Electronico','class' => 'span12')) ?>
            </div>
            <div class="span6">
            <h5>Email 2</h5>
            <?php echo $this->Form->text('email2', array('placeholder' => 'Correo Electronico','class' => 'span12')) ?>
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <h5>Pagina web</h5>
            <?php echo $this->Form->text('paginaweb',array('class' => 'span12','placeholder' => 'URL de la Pagina WEB'));?>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Escoga si es o no socio</h5>
            <?php echo $this->Form->select('tipo_id', $tipos,array('class' => 'span12'))?>
            </div>
            <div class="span6">
            <h5>Fecha-desde</h5>
            <?php echo $this->Form->date('fecha_desde', array('class' => 'span12','placeholder' => 'Click para insertar Fecha'));?>
            </div>
            </div>
            </div>
            
            <?php if ($this->data['Criadero']['nombre'] != null): ?>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Nombre afijo</h5>
            <?php echo $this->Form->text('Criadero.nombre', array('required','class' => 'span12'));?>
            </div>
            <div class="span6">
            <h5>FCI</h5>
            <?php echo $this->Form->text('Criadero.registro_fci', array('class'=>'span12','required'));?>
            </div>
            </div>
            </div>
            <?php else:?>
            <h4>Observaiones Criadero</h4>
            <?php
            $i = 0;
            foreach ($observaciones as $observacion): ?>
            <div class="row-fluid">
            <div class="span12">
            <div class="span6">
            <h5>Nombre <?php echo $i + 1 ?> criadero propuesto</h5>
            <?php echo $this->Form->hidden(null, array('value' => $observacion['id'],
'name' => "data[Observacionesinscripcioncriadero][$i][id]")) ?>
                    <?php echo $this->Form->textarea(null, array('value' => $observacion['observacion'],
'name' => "data[Observacionesinscripcioncriadero][$i][observacion]",'class' =>'span12')); ?>
            </div>
            <div class="span4">
            <h5>Obs <?php echo $i + 1 ?> Exclusivo Of Nac</h5>
            <?php echo $this->Form->textarea(null, array('value' => $observacion['obsexclusivo'],
'name' => "data[Observacionesinscripcioncriadero][$i][obsexclusivo]",'class' =>'span12')); ?>
            </div>
            <div class="span2">
            <?php $valores = array('si' => 'seleccionar') ?>
                   <?php echo $this->Form->radio(null, $valores, array('name' =>
            "data[Observacionesinscripcioncriadero][$i][select]",'class' =>'span12')) ?>
            </div>
            </div>
            </div>
            <?php $i++;?>
            <?php endforeach;?>
            <?php endif;?>
            
            <div class="row-fluid">
            <div class="span12">
            <h5>Estado</h5>
            <?php echo $this->Form->select('estado',$opt, array('class'=>'span12','required'));?>
            <?php $fecha = date("Y-m-d H:m:s"); 
            echo $this->Form->hidden('fecha_registro', array("value"=>$fecha));?>
            </div>
            </div>
            
            </div>
        </div>
   </div>
   
   <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
            <?php echo $this->Form->end()?>
                
  </div>
