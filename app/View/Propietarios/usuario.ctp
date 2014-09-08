
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Usuario de propietario: <?php echo $propietario['Propietario']['nombre'];?></h3>
  </div>
  
  <div class="modal-body">
  <!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
                            <?php if(!empty($mensajem)):?>
                            <label style="color: red;"><?php echo $mensajem;?></label>
                            <?php endif;?>
                            <?php if(empty($usuario)):?>
                            <div class="row-fluid">
                                <div class="span12">
                                    <a href="javascript:" class="btn btn-inverse span12 boton" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'crea_usuario',$idPropietario));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">CREAR USUARIO</a>
                                </div>
                            </div>
                            <?php else:?>
                            <?php echo $this->Form->create('Propietario',array('action' => 'edita_usuario'));?>
                            <div class="row-fluid">
                                <div class="span12">
                                    <h5>Nombre de Usuario</h5>
                                    <?php echo $this->Form->hidden('User.id');?>
                                    <?php echo $this->Form->text('User.username',array('class' => 'span12','required','disabled'));?>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <h5>Password</h5>
                                    <?php echo $this->Form->password('User.password_n',array('class' => 'span12','required'));?>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary span12 boton'));?>
                                </div>
                            </div>
                            <?php echo $this->Form->end()?>
                            <?php endif;?>
			</div>
		</div>
		<!-- // Widget END -->
  </div>

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