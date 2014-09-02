<?php echo $this->Form->create('Propietario',array('action' => 'guarda_propietario_ajax','id' => 'propiform'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Propietario</h3>
  </div>
  
  <div class="modal-body">
  <!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
                            <div class="row-fluid">
                                <div class="span12">
                                    <h5>Nombre del propietario</h5>
                                    <?php echo $this->Form->text('nombre',array('class' => 'span12','required'));?>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="span6">
                                        <h5>C.I.</h5>
                                        <?php echo $this->Form->text('ci',array('class' => 'span12'));?>
                                    </div>
                                    <div class="span6">
                                        <h5>Direccion</h5>
                                        <?php echo $this->Form->text('direccion',array('class' => 'span12'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="span6">
                                        <h5>Telefono</h5>
                                        <?php echo $this->Form->text('telefono1',array('class' => 'span12'));?>
                                    </div>
                                    <div class="span6">
                                        <h5>Celular</h5>
                                        <?php echo $this->Form->text('celular',array('class' => 'span12'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="span6">
                                        <h5>Email/web</h5>
                                        <?php echo $this->Form->text('email1',array('class' => 'span12'));?>
                                    </div>
                                    <div class="span6">
                                        <h5>Criadero</h5>
                                        <?php echo $this->Form->select('criadero_id',$criaderos,array('class' => 'span12'))?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="span6">
                                        <h5>Tipo</h5>
                                        <?php echo $this->Form->select('tipo_id',$tipos, array('class' => 'span12','placeholder' => 'Nombre de la Pista','required')); ?>
                                    </div>
                                    <div class="span6">
                                        <h5>Estado</h5>
                                        <?php echo $this->Form->select('estado', $opt, array('class' => 'span12','placeholder' => 'Inserte una Descripcion','required')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="span6">
                                        <a href="javascript:" class="btn btn-inverse span12 boton" onclick="$('#modalsel').modal('toggle');">Cancelar</a>
                                    </div>
                                    <div class="span6">
                                        <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary span12'));?>
                                    </div>
                                </div>
                            </div>
			</div>
		</div>
		<!-- // Widget END -->
  </div>
<?php echo $this->Form->end()?>
<script>
  $("#propiform").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        beforeSend:function (XMLHttpRequest) {
           $('#imgcargandosele').toggle();$('#modalsele').toggle();
        },
        complete:function (XMLHttpRequest, textStatus) {
            $('#modalsel').modal('toggle');
           $('#imgcargandosele').toggle(100);$('#modalsele').toggle();
        },
        success:function(data, textStatus, jqXHR) 
        {
            $("#nuevoextranjero").html(data);
            //$('#mimodal').load('<?php //echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxpadre',$idMascota,$generacion,$tpadre));?>/'+$.parseJSON(data).mascota_id);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            alert('Ocurrio un error mientras se ejecutaba la funcion');
        }
   });
    e.preventDefault(); //STOP default action
    //e.unbind(); //unbind. to stop multiple form submit.
});
</script>  