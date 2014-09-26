<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>

<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <?php if(!empty($evento)):?>
            <?php if($evento['Evento']['estado']):?>
            <?php echo $this->Form->create('Usuarios',array('id' => 'formuinscripcion'));?>
            <a class="label label-success" href="<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'catalogo_inicial',$evento['Evento']['id']));?>">VER CATALOGO INICIAL</a>
            <h3 class=" text-center">FORMULARIO DE INSCRIPCION (<?php echo $evento['Evento']['nombre']?>)</h3>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <h5>KCB</h5>
                        <?php echo $this->Form->text('Temporalmascota.kcb',array('class' => 'span12','placeholder' => 'KCB del ejemplar a inscribir','id' => 'idcampokcb','style' => 'border-color: green;'));?> 
                        <label id="mensajekcb" class="label label-important"></label>
                    </div>
                    <div class="span8">
                        <h5>Raza</h5>
                        <?php echo $this->Form->select('Temporalmascota.raza_id',$razas,array('class' => 'span12','id' => 'idraza_id'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Nombre Ejemplar</h5>
                        <?php echo $this->Form->text('Temporalmascota.nombre',array('class' => 'span12','placeholder' => 'Nombre del ejemplar a inscribir','id' => 'idnombre_completo'));?>
                    </div>
                    <div class="span6">
                        <h5>color</h5>
                        <?php echo $this->Form->text('Temporalmascota.color',array('class' => 'span12','required','placeholder' => 'Color del ejemplar','id' => 'idcolor'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Fecha de Nacimiento (A&ntilde;o-mes-dia)</h5>
                        <?php echo $this->Form->text('Temporalmascota.fecha_nacimiento',array('class' => 'span12','placeholder' => '____-__-__','id' => 'fechanac','required'));?>
                        <script>
                        $(function(){
                            $("#fechanac").inputmask("y-m-d", {autoUnmask: true});
                        });
                        </script>
                    </div>
                    
                    <div class="span6">
                        <h5>Sexo</h5>
                        <?php echo $this->Form->select('Temporalmascota.sexo',array('macho' => 'Macho','hembra' => 'Hembra'),array('class' => 'span12','required','id' => 'idsexo'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <h5>Registro Extranjero</h5>
                        <?php echo $this->Form->text('Temporalmascota.codigo',array('class' => 'span12','placeholder' => 'Codigo del ejemplar a inscribir','required' => 'false','id' => 'idcampocodigo','style' => 'border-color: green;'));?>
                    <label id="mensajecodigo" class="label label-important"></label>
                    </div>
                    <div class="span4">
                        <h5>Tatuaje</h5>
                        <?php echo $this->Form->text('Temporalmascota.num_tatuaje',array('class' => 'span12','placeholder' => 'Numero de Tatuaje del ejemplar','id' => 'idnum_tatuaje'));?>
                    </div>
                    <div class="span4">
                        <h5>Microchip</h5>
                        <?php echo $this->Form->text('Temporalmascota.chip',array('class' => 'span12','placeholder' => 'Chip del ejemplar','id' => 'idchip'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <h5>Kcb del Padre</h5>
                        <?php echo $this->Form->text('Temporalmascota.kcb_padre',array('class' => 'span12','placeholder' => 'kcb del padre','required','id'=>'idreproductorkcb'));?>
                    </div>
                    <div class="span8">
                        <h5>Nombre del Padre</h5>
                        <?php echo $this->Form->text('Temporalmascota.nombre_padre',array('class' => 'span12','placeholder' => 'Padre del ejemplar','required','id'=>'idreproductornombre_completo'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4">
                        <h5>Kcb de la Madre</h5>
                        <?php echo $this->Form->text('Temporalmascota.kcb_madre',array('class' => 'span12','placeholder' => 'kcb de la madre','required','id'=>'idreproductorakcb'));?>
                    </div>
                    <div class="span8">
                        <h5>Nombre de la Madre</h5>
                        <?php echo $this->Form->text('Temporalmascota.nombre_madre',array('class' => 'span12','placeholder' => 'Madre del ejemplar','required','id'=>'idreproductoranombre_completo'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Categoria</h5>
                        <?php echo $this->Form->select('Temporalmascota.categoriaspista_id',$categorias,array('class' => 'span12','required'));?>
                    </div>
                    <div class="span6">
                        <h5>Criador</h5>
                        <?php echo $this->Form->text('Temporalmascota.criador',array('class' => 'span12','placeholder' => 'Nombre del Criador','required','id' => 'idpropietarionombre'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Propietario</h5>
                        <?php echo $this->Form->text('Temporalmascota.propietario',array('class' => 'span12','required','placeholder' => 'Nombre del propietario','id' => 'idpropietarioactualnombre'));?> 
                    </div>
                    <div class="span6">
                        <h5>Ciudad/Pais</h5>
                        <?php echo $this->Form->text('Temporalmascota.ciudad_pais',array('class' => 'span12','placeholder' => 'Ciudad - Pais','required','id' => 'idpropietarioactualciudad_pais'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Telefono</h5>
                        <?php echo $this->Form->text('Temporalmascota.telefono',array('class' => 'span12','required','placeholder' => 'Nombre del propietario','id' => 'idpropietarioactualtelefono1'));?> 
                    </div>
                    <div class="span6">
                        <h5>Email</h5>
                        <?php echo $this->Form->text('Temporalmascota.email',array('class' => 'span12','placeholder' => 'Email del propietario','required','id' => 'idpropietarioactualemail1'));?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $this->Form->hidden('Temporalmascota.evento_id',array('value' => $idEvento))?>
                    <?php echo $this->Form->submit('ENVIAR',array('class' => 'btn btn-block btn-primary'));?>
                </div>
            </div>
            <?php echo $this->Form->end();?>
            <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</div>

<script>
    
  $('#idcampokcb').change(function(){
      var postData = $('#formuinscripcion').serializeArray();
    $.ajax(
    {
        url : '<?php echo $this->Html->url(array('action' => 'verifica_kcb'))?>',
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            //$('#mensajekcb').text($.parseJSON(data).mensaje.no);
            $('#idraza_id').val($.parseJSON(data).mascota.Mascota.raza_id);
            $('#idnombre_completo').val($.parseJSON(data).mascota.Mascota.nombre_completo);
            $('#idcolor').val($.parseJSON(data).mascota.Mascota.color);
            $('#idfecha_nacimiento').val($.parseJSON(data).mascota.Mascota.fecha_nacimiento);
            $('#idsexo').val($.parseJSON(data).mascota.Mascota.sexo);
            $('#idcampocodigo').val($.parseJSON(data).mascota.Mascota.codio);
            $('#idnum_tatuaje').val($.parseJSON(data).mascota.Mascota.num_tatuaje);
            $('#idchip').val($.parseJSON(data).mascota.Mascota.chip);
            $('#idreproductorkcb').val($.parseJSON(data).mascota.Reproductor.kcb);
            $('#idreproductornombre_completo').val($.parseJSON(data).mascota.Reproductor.nombre_completo);
            $('#idreproductorakcb').val($.parseJSON(data).mascota.Reproductora.kcb);
            $('#idreproductoranombre_completo').val($.parseJSON(data).mascota.Reproductora.nombre_completo);
            $('#idpropietarionombre').val($.parseJSON(data).mascota.Propietario.nombre);
            $('#idpropietarioactualnombre').val($.parseJSON(data).mascota.Propietarioactual.nombre);
            $('#idpropietarioactualciudad_pais').val($.parseJSON(data).mascota.Propietarioactual.ciudad_pais);
            $('#idpropietarioactualtelefono1').val($.parseJSON(data).mascota.Propietarioactual.telefono1);
            $('#idpropietarioactualemail1').val($.parseJSON(data).mascota.Propietarioactual.email1);
            //data: return data from server
            //$("#parte").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert('OCURRIO UN ERROR AL EJECUTAR LA CONSULTA!!!!!');     
        }
    });
  });
  
  $('#idcampocodigo').change(function(){
      var postData = $('#formuinscripcion').serializeArray();
    $.ajax(
    {
        url : '<?php //echo $this->Html->url(array('action' => 'verifica_codigo'))?>',
        type: "POST",
        data : postData,
       
        success:function(data, textStatus, jqXHR) 
        {
            $('#idcampokcb').val($.parseJSON(data).mascota.Mascota.kcb);
            $('#idraza_id').val($.parseJSON(data).mascota.Mascota.raza_id);
            $('#idnombre_completo').val($.parseJSON(data).mascota.Mascota.nombre_completo);
            $('#idcolor').val($.parseJSON(data).mascota.Mascota.color);
            $('#idfecha_nacimiento').val($.parseJSON(data).mascota.Mascota.fecha_nacimiento);
            $('#idsexo').val($.parseJSON(data).mascota.Mascota.sexo);
            $('#idnum_tatuaje').val($.parseJSON(data).mascota.Mascota.num_tatuaje);
            $('#idchip').val($.parseJSON(data).mascota.Mascota.chip);
            $('#idreproductorkcb').val($.parseJSON(data).mascota.Reproductor.kcb);
            $('#idreproductornombre_completo').val($.parseJSON(data).mascota.Reproductor.nombre_completo);
            $('#idreproductorakcb').val($.parseJSON(data).mascota.Reproductora.kcb);
            $('#idreproductoranombre_completo').val($.parseJSON(data).mascota.Reproductora.nombre_completo);
            $('#idpropietarionombre').val($.parseJSON(data).mascota.Propietario.nombre);
            $('#idpropietarioactualnombre').val($.parseJSON(data).mascota.Propietarioactual.nombre);
            $('#idpropietarioactualciudad_pais').val($.parseJSON(data).mascota.Propietarioactual.ciudad_pais);
            $('#idpropietarioactualtelefono1').val($.parseJSON(data).mascota.Propietarioactual.telefono1);
            $('#idpropietarioactualemail1').val($.parseJSON(data).mascota.Propietarioactual.email1);
           // $('#mensajecodigo').text($.parseJSON(data).mensaje);
            //$('#idraza_id').val($.parseJSON(data).mascota.raza_id);
            //data: return data from server
            //$("#parte").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
           alert('OCURRIO UN ERROR AL EJECUTAR LA CONSULTA!!!!!');     
        }
    });
  });

</script>