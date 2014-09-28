<?php echo $this->Form->create('Cuenta',array('action' => 'guardaingreso','id' => 'formupago'));?>
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
                
        <div class="row-fluid">
        <div class="span12">
        <h5>Propietario</h5>
        <div id="divselectpropajax">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Ingreso.propietario_id','divselectpropajax'));?>');"><?php if(!empty($this->request->data['Propietario']['nombre'])){echo $this->request->data['Propietario']['nombre'];}else{echo 'SELECCIONE PROPIETARIO';}?> </a>
        <?php echo $this->Form->hidden('Ingreso.propietario_id',array('value' => $this->request->data['Propietario']['id']));?>
        <?php echo $this->Form->hidden('Ingreso.id');?>
        </div>
        </div>
        </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Sucursal</h5>
                                            <?php echo $this->Form->select('Ingreso.sucursale_id',$sucursales,array('class' => 'span12','required'));?>
                                        </div>
                                    </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Pago de</h5>
        <?php echo $this->Form->select('Ingreso.tramite_id',$tramites,array('class'=> 'span12','required','id' => 'selecttramite'));?>
        </div>
        <div class="span6">
        <h5>Nro Comprobante</h5>
        <?php echo $this->Form->text('Ingreso.comprobante',array('class' => 'span12'));?>
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
        <div class="span6" id="montoestimado">
        <h5>Monto Total</h5>
        <?php echo $this->Form->text('Ingreso.monto_total',array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <h5>Estado</h5>
        <?php echo $this->Form->select('Ingreso.estado',array(0 => 'Pendiente',1 => 'Confirmado'),array('class' => 'span12','required'));?>
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