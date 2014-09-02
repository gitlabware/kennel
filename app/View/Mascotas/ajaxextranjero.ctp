
<?php echo $this->Form->create('Mascota',array('action' => 'guardaextranjero/'.$idMascota,'id' => 'mascotaform'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Formulario Ejemplar extranjero</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
		<div class="span12">
			<div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<div class="widget-body">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Nombre Completo del Ejemplar</h5>
                                            <?php echo $this->Form->text('Mascota.nombre',array('class' => 'span12','required'));?>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Raza</h5>
                                            <?php echo $this->Form->select('Mascota.raza_id',$razas,array('class' => 'span12','required'));?>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <h5>Sexo</h5>
                                            <?php $dcs = array('macho' => 'Macho', 'hembra' => 'Hembra'); ?>
                                            <?php echo $this->Form->select('Mascota.sexo', $dcs, array('class' => 'span12','required'));?>
                                        </div>
                                        <div class="span6">
                                            <h5>Codigo</h5>
                                            <?php echo $this->Form->text('Mascota.codigo',array('class' => 'span12','required'));?>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                    <div class="span12">
                                    <div class="span6">
                                    <h5>Color</h5>
                                    <?php echo $this->Form->text('Mascota.color', array('placeholder' => 'Insertar el Color','required','class' => 'span12')); ?>
                                    </div>
                                    <div class="span6">
                                    <h5>Se&ntilde;as o Marca</h5>
                                    <?php echo $this->Form->text('Mascota.senas', array('placeholder' => 'Insertar senas o marca','class' => 'span12')); ?>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="span6">
                                            <h5>Origen</h5>
                                            <?php echo $this->Form->text('Mascota.origen', array('placeholder' => 'origen del extranjero','class' =>'span12')); ?>
                                            </div>
                                            <div class="span6">
                                            <h5>Ciudad/Pais (Lugar)</h5>
                                            <?php echo $this->Form->text('Mascota.lugar_extranjero', array('placeholder' => 'Ciudad/pais del extranjero','class' =>'span12')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Fecha Nacimiento (A&ntilde;o-mes-dia)</h5>

                                                <?php echo $this->Form->text('Mascota.fecha_nacimiento', array('placeholder' => '____-__-__', 'id' => 'idfechanac','required' => 'false','class' => 'span12')); ?>
                                            <script>
                                            $(function(){
                                                $("#idfechanac").inputmask("y-m-d", {});
                                            });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <h5>Titulos</h5>
                                            <?php echo $this->Form->hidden('Mascota.titulos_ex',array('id' => 'titulos_extr','style' => 'width: 100%'))?>
                                                                    <div class="separator bottom"></div>
                                                                    <script>
                                                                        $(function()
                                                                        {
                                                                            $("#titulos_extr").select2({tags:[]});
                                                                        });
                                                                        </script>
                                            </div>
                                    </div>
                                    
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="span6">
                                                <a href="javascript:" class="btn btn-inverse span12 boton" onclick="$('#modalsel').modal('toggle');">Cancelar</a>
                                            </div>
                                            <div class="span6">
                                                <?php echo $this->Form->submit('Registrar',array('class' => 'btn btn-primary span12 boton'));?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end();?>
                                </div>
                        </div>
		</div>
	</div>
  </div>
  <script>
  $("#mascotaform").submit(function(e)
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
  
  
