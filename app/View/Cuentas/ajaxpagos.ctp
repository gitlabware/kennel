<?php echo $this->Form->create('Cuenta',array('action' => 'guardaingresos','id' => 'formupago'));?>
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
        <h5>Pago de: </h5>
        
        <?php echo $this->Form->select('Ingreso.tramite_id',$tramites,array('class'=> 'span12','required','id' => 'selecttramite'));?>
        <?php echo $this->Form->hidden('Ingreso.id');?>
        </div>
        </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Sucursal</h5>
                                            <?php echo $this->Form->select('Ingreso.sucursale_id',$sucursales,array('class' => 'span12','required','id' => 'selectsucursal'));?>
                                        </div>
                                    </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Para: </h5>
        <?php echo $this->Form->select('Ingreso.tipo_id',$tipos,array('class' => 'span12','required','id' => 'selecttipo'));?>
        </div>
        <div class="span6" id="montoestimado">
        <h5>Monto Total</h5>
        <?php echo $this->Form->text('Ingreso.monto_total',array('class' => 'span12'));?>
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
                $("#selecttipo").bind("change", 
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
                $("#selectsucursal").bind("change", 
                function (event) {
                    $.ajax({
                        async:true, data:$("#formupago").serialize(), dataType:"html", success:function (data, textStatus) {
                                $("#montoestimado").html(data);
                                }, type:"POST", url:"<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmontototal'));?>"
                            });
            return false;});});
            </script>
        
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
  </div>
<script>
  $("#formupago").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        beforeSend:function (XMLHttpRequest) {
            $('#imgcargando').toggle();$('#mimodal').toggle();
        },
        complete:function (XMLHttpRequest, textStatus) {
            window.location.href = '<?php echo $this->Html->url(array('action' => 'index'));?>';
        },
        /*success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
            $("#parte").html(data);
        },*/
        error: function(jqXHR, textStatus, errorThrown) 
        {
            alert('Ocurrio un error al momento de ejecutar la funcion');
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    //e.unbind(); //unbind. to stop multiple form submit.
});
</script>