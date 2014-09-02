<h3 align="center">Registro de Inspeccion Criadero <?php echo $id?></h3>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <table class="table table-bordered table-white">
        
        <tbody>
        <tr>
            <td><strong>Nombre Propietario:</strong></td>
            <td>
            <?php echo $criadero['Propietario']['nombre']?>
            </td>
            <td><strong>Con C.I.:</strong></td>
            <td>
            <?php echo $criadero['Propietario']['ci']?>
            </td>
         </tr>
         <tr>
            <td><strong>Nombre copropietario:</strong></td>
            <td>
            <?php echo $criadero['Copropietario']['nombre']?>
            </td>
            <td><strong>Con C.I.:</strong></td>
            <td>
            <?php echo $criadero['Copropietario']['ci']?>
            </td>
         </tr>
         <tr>
            <td><strong>Direcci&oacute;n criadero:</strong></td>
            <td>
            <?php echo $criadero['Criadero']['direccion']?>
            </td>
            <td><strong>Ciudad:</strong></td>
            <td>
            <?php echo $criadero['Departamento']['nombre']?>
            </td>
         </tr>
         <tr>
            <td><strong>Tel&eacute;fonos fijos:</strong></td>
            <td>
            <?php echo $criadero['Criadero']['telefono1']?>&nbsp;
            <?php echo $criadero['Criadero']['telefono2']?>
            </td>
            <td><strong>Tel&eacute;fonos celulares:</strong></td>
            <td>
            <?php echo $criadero['Criadero']['celular1']?>
            <?php echo $criadero['Criadero']['celular2']?>
            </td>
         </tr>
         <tr>
            <td><strong>Correo electr&oacute;nico:</strong></td>
            <td>
            <?php echo $criadero['Criadero']['email1']?>
            </td>
            <td><strong>email 2:</strong></td>
            <td>
            <?php echo $criadero['Criadero']['email2']?>
            </td>
         </tr>
         <tr>
            <td><strong>Es socio de KCB:</strong></td>
            <td>
               <table>
                  <tr>
                  <td>SI</td>
                  <?php if($criadero['Propietario']['tipo_id'] == 1):?>
                     <td>
                     X
                     </td>
                     <td>NO</td>
                     <td>
                     &nbsp;
                     </td>
                  <?php else: ?>
                     <td>
                     &nbsp;
                     </td>
                     <td>NO</td>
                     <td>
                        X
                     </td>
                   <?php endif; ?>                  
                  </tr>
               </table>
            </td>
         </tr>
        </tbody>
         
      </table>
      <?php echo $this->Form->create('Inspeccioncriadero'); ?>  
      <div class="row-fluid">
      <div class="span12">
      <div class="span3">
      <h5>Instalaciones</h5>
      <?php echo $this->Form->hidden('id');?>
      <?php echo $this->Form->select('instalacione_id', $instalaciones, array('class'=>'span12','required'));?>
      <?php echo $this->Form->text('instalacion_otro', array('placeholder'=>'Una Descripcion','class' => 'span12')) ?>
      </div>
      <div class="span3">
      <h5>Espacio suficiente</h5>
      <?php 
         $espacio = array(1=>'SI', 0=>'NO');
         echo $this->Form->select('espacio', $espacio,array('class' => 'span12'));
         ?>
      </div>
      <div class="span3">
      <h5>Condiciones de higiene</h5>
      <?php echo $this->Form->select('condicioneshigienica_id', $condicioneshiguienicas, array('class'=>'span12','required'));?>
      </div>
      <div class="span3">
      <h5>Condici&oacute;n gral ejemplares</h5>
      <?php echo $this->Form->select('condicionejemplare_id', $condicionesjemplares, array('class'=>'span12','required'));?>
      </div>
      </div>
      </div>
      <div class="row-fluid">
      <div class="span12">
      <div class="span6">
      <h5>Fecha inspeccion</h5>
      <?php echo $this->Form->date('fecha_inspeccion', array('id'=>'date1','class'=>'span12','required','placeholder'=>'Click Insertar Fecha'));?>
      </div>
      <div class="span6">
      <h5>Fecha nueva inspeccion</h5>
      <?php echo $this->Form->date('nueva_fecha_inspeccion', array('id'=>'date2','class'=>'span12','required','placeholder'=>'Click Insertar Fecha'));?>
      </div>
      </div>
      </div>
      <h4>Datos pie de formulario</h4>
      <div class="row-fluid">
      <div class="span12">
      <div class="span3">
      <h5>Lugar</h5>
      <?php echo $this->Form->select('departamento_id', $departamentos,array('class' => 'span12')); ?>
      </div>
      <div class="span3">
      <h5>Fecha</h5>
      <?php echo $this->Form->date('fecha', array('class'=>'span12','required','placeholder'=>'Click Insertar Fecha'));?>
      </div>
      <div class="span3">
      <h5>Recibo</h5>
      <?php echo $this->Form->text('recibo', array('placeholder'=>'Insertar Recibo','class' => 'span12','required')) ?>
      </div>
      <div class="span3">
      <h5>Fecha de recepci&oacute;n</h5>
      <?php echo $this->Form->date('fecha_recepcion', array('class'=>'span12','required','placeholder'=>'Click Insertar Fecha'));?>
      </div>
      </div>
      </div>
      <div class="row-fluid">
      <div class="span12">
      <div class="span2">
      <h5>Firma propietario</h5>
      <?php echo $this->Form->checkbox('firma_propietario',array('class' => 'span12'))?>
      </div>
      <div class="span2">
      <h5>Firma copropietario</h5>
      <?php echo $this->Form->checkbox('firma_copropietario',array('class' => 'span12'))?>
      </div>
      <div class="span2">
      <h5>Firma recetor regional</h5>
      <?php echo $this->Form->checkbox('firma_recetor_regional',array('class' => 'span12'))?>
      </div>
      <div class="span3">
      <h5>Firma inspector subcomicion</h5>
      <?php echo $this->Form->checkbox('firma_inspector_subcomision',array('class' => 'span12'))?>
      </div>
      <div class="span2">
      <h5>Sello regional</h5>
      <?php echo $this->Form->checkbox('sello_regional',array('class' => 'span12')) ?>
      </div>
      </div>
      </div>
      <br />
      <div class="row-fluid">
      <div class="span12">
      <div class="span6">
      <?php echo $this->Html->link('CANCELAR',array('action' => 'index'),array('class' => 'btn btn-block btn-warning'));?>
      </div>
      <div class="span6">
      <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
      <?php echo $this->Form->end();?>
      </div>
      </div>
      </div>
        </div>
    </div>
</div>