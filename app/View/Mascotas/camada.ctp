<h3 align="center">Formulario de Camada</h3>
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <?php echo $this->Form->create('Mascota', array('action' => 'registrar_camada')); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <div id="divselectpadre2">
                            <h5>Padre</h5>
                            <div id="divselectpadreajax2">
                                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'combomascotas1', 'Mascota.reproductor_id', 'divselectpadreajax2')); ?>');"> SELECCIONE AL PADRE</a>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div id="divselectmadre2">
                            <h5>Madre</h5>
                            <div id="divselectmadreajax2">
                                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'combomascotas1', 'Mascota.reproductora_id', 'divselectmadreajax2')); ?>');"> SELECCIONE A LA MADRE </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <div id="divselectprop2">
                            <h5>Propietario Actual</h5>
                            <div id="divselectpropajax2">
                                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'combo1', 'Mascota.propietarioactual_id', 'divselectpropajax2')); ?>');"> SELECCIONE EL PROPIETARIO</a>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <h5>Afijo</h5>
                        <div id="divselectcriaajax2">
                            <?php echo $this->Form->hidden('criadero_id'); ?>
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Criaderos', 'action' => 'combo1', 'Mascota.criadero_id', 'divselectcriaajax2')); ?>');"> SELECCIONE EL AFIJO </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Prefijo nombre (Sea el caso)</h5>
                        <?php echo $this->Form->text('Mascota.prefijo', array('placeholder' => 'Prefijo Nombre', 'class' => 'span12')); ?>
                    </div>
                    <div class="span6">
                        <h5>Primero en mostrar</h5>
                        <?php echo $this->Form->select('Mascota.orden', array('0' => 'nombre', '1' => 'afijo'), array('class' => 'span12')); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Raza</h5>
                        <?php echo $this->Form->select('Mascota.raza_id', $razas, array('required', 'id' => 'selecraza2', 'class' => 'span12')); ?>
                    </div>
                    <div class="span6">
                        <h5>Fecha Nacimiento</h5>
                        <?php echo $this->Form->date('Mascota.fecha_nacimiento', array('placeholder' => 'Click para Insertar Fecha', 'id' => 'date2', 'required', 'class' => 'span12')); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6">
                        <h5>Lechigada</h5>
                        <?php echo $this->Form->text('Mascota.lechigada', array('class' => 'span12')); ?>
                    </div>
                    <div class="span6">
                        <h5>Fecha de Emision</h5>
                        <?php echo $this->Form->date('Mascota.fecha_emision', array('class' => 'span12', 'placeholder' => 'Click para Insertar Fecha', 'id' => 'fechae2')); ?>
                    </div>
                </div>
            </div>
            <div class="row-fluid" id="divrefmascota-0">
                <div class="span12">
                    <div class="span6">
                        <h5>Lugar</h5>
                        <?php echo $this->Form->select('Mascota.departamento_id', $departamentos, array('class' => 'span12')); ?>
                    </div>
                    <div class="span3">
                        <h5>&nbsp;</h5>
                        <button class="btn btn-block btn-success" type="button" onclick="add_mascota();">ADICIONAR</button>
                    </div>
                    <div class="span3">
                        <h5>&nbsp;</h5>
                        <button class="btn btn-block btn-danger" type="button" onclick="quita_mascota();">QUITAR</button>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <button class="btn btn-block btn-primary" type="submit">REGISTRAR</button>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<script>

  var numero_mascotas = 0;
  var sector_mascota = '';
  function add_mascota() {
      numero_mascotas++;
      sector_mascota = '<div id="divrefmascota-' + numero_mascotas + '">'
              + '<h3>EJEMPLAR # ' + numero_mascotas + '</h3>'
              + '<div class="row-fluid">'
              + ' <div class="span12">'
              + '   <div class="span6">'
              + '     <h5>Nombre</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][nombre]" class="span12" required>'
              + '   </div>'
              + '   <div class="span6">'
              + '     <h5>KCB</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][kcb]" class="span12" required>'
              + '   </div>'
              + ' </div>'
              + '</div>'
              + '<div class="row-fluid">'
              + ' <div class="span12">'
              + '   <div class="span6">'
              + '     <h5>Nro de tatuaje</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][num_tatuaje]" class="span12" >'
              + '   </div>'
              + '   <div class="span6">'
              + '     <h5>Nro Chip</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][chip]" class="span12" >'
              + '   </div>'
              + ' </div>'
              + '</div>'
              + '<div class="row-fluid">'
              + ' <div class="span12">'
              + '   <div class="span6">'
              + '     <h5>Color</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][color]" class="span12" required>'
              + '   </div>'
              + '   <div class="span6">'
              + '     <h5>Se&ntilde;as</h5>'
              + '     <input type="text" name="data[Ejemplar][mascotas][' + numero_mascotas + '][senas]" class="span12" >'
              + '   </div>'
              + ' </div>'
              + '</div>'
              + '<div class="row-fluid">'
              + ' <div class="span12">'
              + '   <div class="span6">'
              + '     <h5>Sexo</h5>'
              + '     <select class="span12" name="data[Ejemplar][mascotas][' + numero_mascotas + '][sexo]" required>'
              + '       <option value=""></option>'
              + '       <option value="macho">Macho</option>'
              + '       <option value="hembra">Hembra</option>'
              + '     </select>'
              + '   </div>'
              + ' </div>'
              + '</div>'
              + '</div>';
      cantidad = numero_mascotas - 1;
      $('#divrefmascota-' + cantidad).after(sector_mascota);
  }
  function quita_mascota() {
      if (numero_mascotas != 1) {
          jQuery('#divrefmascota-' + numero_mascotas).remove();
          numero_mascotas--;
      }
  }
  add_mascota();
</script>