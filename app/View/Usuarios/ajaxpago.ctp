<?php echo $this->Form->create('Usuario',array('action' => 'guardaingreso','id' => 'formupago'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Pago</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
        <?php echo $this->Form->hidden('Ingreso.propietario_id',array('value' => $this->Session->read('Auth.User.propietario_id')));?>
        <div class="row-fluid">
        <div class="span12">
        <h5>Tipo de Pago</h5>
        <?php echo $this->Form->select('Ingreso.tramite_id',$tramites,array('class'=> 'span12','required','id' => 'selecttramite'));?>
        
        </div>
        </div>        
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Nro Comprobante</h5>
        <?php echo $this->Form->text('Ingreso.comprobante',array('class' => 'span12','required'));?>
        </div>
        <div class="span6">
        <h5>Cuenta</h5>
        <?php echo $this->Form->hidden('Ingreso.id');?>
        <?php echo $this->Form->select('Ingreso.cuentasbancaria_id', $cuentas,array('class' => 'span12','required','id' => 'selectcuenta'));?>
        </div>
        </div>
        </div>
        
        <div class="row-fluid">
        <div class="span12">
        <div class="span12">
        <h5>Glosa</h5>
        <?php echo $this->Form->text('Ingreso.glosa',array('class' => 'span12'));?>
        </div>
        </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#selecttramite").bind("change", 
                function (event) {
                    $.ajax({
                        async:true, data:$("#formupago").serialize(), dataType:"html", success:function (data, textStatus) {
                                $("#montoestimado").html(data);
                                }, type:"POST", url:"<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmontototal'));?>"
                            });
            return false;});});
            </script>
            <script>
            $(document).ready(function () {
                $("#selectcuenta").bind("change", 
                function (event) {
                    $.ajax({
                        async:true, data:$("#formupago").serialize(), dataType:"html", success:function (data, textStatus) {
                                $("#montoestimado").html(data);
                                }, type:"POST", url:"<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmontototal'));?>"
                            });
            return false;});});
            </script>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        
        <div id="montoestimado">
        
        </div>
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