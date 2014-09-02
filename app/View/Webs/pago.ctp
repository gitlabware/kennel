<div class="innerLR" >
    
    <div class="widget widget-heading-simple widget-body-white">
    <?php echo $this->Form->create('Web',array('action' => 'guardapago'));?>
        <div class="widget-body">
        <h3>Formulario de registro de Pago</h3>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Cuenta</h5>
        <?php echo $this->Form->hidden('Ingreso.user_id',array('value' => $this->Session->read('Auth.User.id')));?>
        <?php echo $this->Form->hidden('Ingreso.propietario_id',array('value' => $this->Session->read('Auth.User.propietario_id')));?>
        <?php echo $this->Form->select('Ingreso.cuentasbancaria_id', $cuentas,array('class' => 'span12','required'));?>
        </div>
        <div class="span6">
        <h5>Pago de: </h5>
        <?php echo $this->Form->select('Ingreso.tramite_id',$tramites,array('class'=> 'span12','required'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span3">
        <h5>Nro Comprobante</h5>
        <?php echo $this->Form->text('Ingreso.comprobante',array('class' => 'span12','required'));?>
        </div>
        <div class="span9">
        <h5>Glosa</h5>
        <?php echo $this->Form->text('Ingreso.glosa',array('class' => 'span12'));?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>&nbsp;</h5>
        <?php echo $this->Html->link('Regresar',array('action' => 'menupropietario'),array('class' => 'btn btn-block btn-inverse'));?>
        </div>
        <div class="span6">
        <h5>&nbsp;</h5>
        <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
        </div>
        
        </div>
        </div>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>