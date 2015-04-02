


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Formulario Ejemplar</h3>
</div>

<div class="modal-body">
    <div class="row-fluid">

        <!-- Column -->

        <div class="span12">

            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
                <?php if (!empty($mensajem)): ?>
                  <label style="color: red;"><?php echo $mensajem; ?></label>
                <?php endif; ?>
                <!-- // Widget heading END -->
                <div class="widget-body">
                    <?php echo $this->Form->create('Mascota', array('action' => 'guardamascota')); ?>		
                    <h5>Nombre del Ejemplar</h5>
                    <?php
                    echo $this->Form->hidden('id');
                    ?>
                    <?php echo $this->Form->text('nombre', array('placeholder' => 'Nombre del ejemplar', 'required', 'class' => 'span12')); ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Prefijo nombre (Sea el caso)</h5>
                                <?php echo $this->Form->text('prefijo', array('placeholder' => 'Prefijo Nombre', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Primero en mostrar</h5>
                                <?php echo $this->Form->select('orden', array('0' => 'nombre', '1' => 'afijo'), array('class' => 'span12')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Kcb</h5>
                                <?php echo $this->Form->text('kcb', array('placeholder' => 'K c b', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Numero de tatuaje</h5>
                                <?php echo $this->Form->text('num_tatuaje', array('placeholder' => 'Numero de Tatuaje', 'class' => 'span12')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Numero de Chip</h5>
                                <?php echo $this->Form->text('chip', array('placeholder' => 'Numero de Chip', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Fecha Nacimiento</h5>
                                <?php echo $this->Form->date('fecha_nacimiento', array('placeholder' => 'Click para Insertar Fecha', 'id' => 'date', 'required', 'class' => 'span12')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Color</h5>
                                <?php echo $this->Form->text('color', array('placeholder' => 'Insertar el Color', 'required', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Se&ntilde;as o Marca</h5>
                                <?php echo $this->Form->text('senas', array('placeholder' => 'Insertar senas o marca', 'class' => 'span12')); ?>
                            </div>
                        </div>
                    </div>
                    <h5>Raza</h5>

                    <?php echo $this->Form->select('raza_id', $razas, array('required', 'id' => 'selecraza', 'class' => 'span12')); ?>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Variedad</h5>
                                <?php echo $this->Form->text('variedad', array('placeholder' => 'Nombre Completo', 'class' => 'span12')) ?>
                            </div>
                            <div class="span6">
                                <h5>Sexo</h5>
                                <?php $dcs = array('macho' => 'Macho', 'hembra' => 'Hembra'); ?>
                                <?php echo $this->Form->select('sexo', $dcs, array('class' => 'span12', 'required')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-warning span12" onclick="$('#imgcargandosele').toggle();
                            $('#modalsele').toggle();
                            $('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'ajaxextranjero', $idMascota)); ?>', function () {
                              $('#imgcargandosele').toggle(100);
                              $('#modalsele').toggle();
                            });">Registro rapido de Nuevo Extranjero</a>

                        </div>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="span12">
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-inverse span12" onclick="$('#imgcargandosele').toggle();
                            $('#modalsele').toggle();
                            $('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'ajaxpropietario')); ?>', function () {
                              $('#imgcargandosele').toggle(100);
                              $('#modalsele').toggle();
                            });">Registro rapido de Nuevo Propietario</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div id="nuevoextranjero"></div>
                        </div>
                    </div>
                    <div id="divselectpadre">
                        <h5>Padre</h5>
                        <div id="divselectpadreajax">
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'combomascotas1', 'Mascota.reproductor_id', 'divselectpadreajax')); ?>');"> <?php if (!empty($this->request->data['Reproductor']['nombre_completo'])) {
                              echo $this->request->data['Reproductor']['nombre_completo'];
                            } else {
                              echo 'SELECCIONE AL PADRE';
                            } ?> </a>
                        </div>
                    </div>

                    <div id="divselectmadre">
                        <h5>Madre</h5>
                        <div id="divselectmadreajax">
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'combomascotas1', 'Mascota.reproductora_id', 'divselectmadreajax')); ?>');"> <?php if (!empty($this->request->data['Reproductora']['nombre_completo'])) {
                              echo $this->request->data['Reproductora']['nombre_completo'];
                            } else {
                              echo 'SELECCIONE LA MADRE';
                            } ?> </a>
                        </div>
                    </div>
                    <div id="divselectprop">
                        <h5>Propietario Actual</h5>
<?php //echo $this->Form->select('propietario_id', $dcp,array('class' => 'span12'));  ?>
                        <div id="divselectpropajax">
                            <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios', 'action' => 'combo1', 'Mascota.propietarioactual_id', 'divselectpropajax')); ?>');"><?php if (!empty($this->request->data['Propietarioactual']['nombre'])) {
  echo $this->request->data['Propietarioactual']['nombre'];
} else {
  echo 'SELECCIONE EL PROPIETARIO ACTUAL';
} ?> </a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Afijo</h5>
                                <div id="divselectcriaajax">
                    <?php echo $this->Form->hidden('criadero_id'); ?>
                                    <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Criaderos', 'action' => 'combo1', 'Mascota.criadero_id', 'divselectcriaajax')); ?>');"><?php if (!empty($this->request->data['Criadero']['nombre'])) {
                      echo $this->request->data['Criadero']['nombre'];
                    } else {
                      echo 'SELECCIONE EL AFIJO';
                    } ?> </a>

                                </div>
                                <?php //echo $this->Form->select('criadero_id', $criaderos,array('class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Lugar</h5>
                                <?php echo $this->Form->select('departamento_id', $departamentos, array('class' => 'span12')); ?>
                            </div>
                        </div>
                    </div>
                    <h5>Consanguinidad</h5>
<?php echo $this->Form->text('consanguinidad', array('placeholder' => 'Insertar Consanguinidad', 'class' => 'span12')); ?>
                    <h5>Hermano</h5>
<?php echo $this->Form->textarea('hermano', array('placeholder' => 'Insertar al hermano', 'class' => 'span12')); ?>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Lechigada</h5>
<?php echo $this->Form->text('lechigada', array('class' => 'sapn12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Fecha de Emision</h5>
<?php echo $this->Form->date('fecha_emision', array('class' => 'span12', 'placeholder' => 'Click para Insertar Fecha', 'id' => 'fechae')); ?>
                            </div>
                        </div>
                    </div>

                    <div class="center"><h5><b>En caso de ser extranjero</b></h5></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Origen</h5>
<?php echo $this->Form->text('origen', array('placeholder' => 'origen del extranjero', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Codigo o Registro</h5>
<?php echo $this->Form->text('codigo', array('placeholder' => 'Codigo del extranjero', 'class' => 'span12', 'required' => 'false')); ?>
                            </div>
                        </div>

                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                                <h5>Ciudad/Pais (Lugar)</h5>
<?php echo $this->Form->text('lugar_extranjero', array('placeholder' => 'Ciudad/pais del extranjero', 'class' => 'span12')); ?>
                            </div>
                            <div class="span6">
                                <h5>Titulos</h5>
<?php echo $this->Form->hidden('titulos_ex', array('id' => 'titulos_ex2', 'style' => 'width: 100%')) ?>
                                <div class="separator bottom"></div>
                                <script>
                                  $(function ()
                                  {
                                      $("#titulos_ex2").select2({tags: []});
                                  });
                                </script>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#divmasopciones').toggle(400);">MAS OPCIONES</a>
                    <div id="divmasopciones" style="display: none;">
                        <h5>En caso de ser Pedigree de exportacion</h5>
                        <div class="row-fluid">
                            <div class="span12">

                                <span class="span6">
                                    <?php echo $this->Form->hidden('EstadosMascota.0.id'); ?>
                                    <?php echo $this->Form->checkbox('EstadosMascota.0.estado_id'); ?>
<?php echo $this->Form->date('EstadosMascota.0.fecha') ?>
                                </span>
                                <div class="span6">
<?php echo $this->Form->text('EstadosMascota.0.observacion', array('class' => 'span12', 'placeholder' => 'Ingresar una Observacion')) ?>
                                </div>
                            </div>
                        </div>

                        <h5>En caso de Duplicado de pedigree</h5>
                        <div class="row-fluid">
                            <div class="span12">

                                <span class="span6">
                                    <?php echo $this->Form->hidden('EstadosMascota.1.id'); ?>
                                    <?php echo $this->Form->checkbox('EstadosMascota.1.estado_id'); ?>
<?php echo $this->Form->date('EstadosMascota.1.fecha') ?> 
                                </span>
                                <div class="span6">
<?php //echo $this->Form->text('EstadosMascota.0.observacion',array('class' =>'span12','placeholder' => 'Ingresar una Observacion'))  ?>
                                </div>
                            </div>
                        </div>

                        <h5>En caso de Fallecido</h5>
                        <div class="row-fluid">
                            <div class="span12">

                                <span class="span6">
                                    <?php echo $this->Form->hidden('EstadosMascota.2.id'); ?>
                                    <?php echo $this->Form->checkbox('EstadosMascota.2.estado_id'); ?>
<?php echo $this->Form->date('EstadosMascota.2.fecha') ?> 
                                </span>
                                <div class="span6">
<?php //echo $this->Form->text('EstadosMascota.0.observacion',array('class' =>'span12','placeholder' => 'Ingresar una Observacion'))  ?>
                                </div>
                            </div>
                        </div>

                        <h5>En caso de Robado</h5>
                        <div class="row-fluid">
                            <div class="span12">

                                <span class="span6">
                                    <?php echo $this->Form->hidden('EstadosMascota.3.id'); ?>
                                    <?php echo $this->Form->checkbox('EstadosMascota.3.estado_id'); ?>
<?php echo $this->Form->date('EstadosMascota.3.fecha') ?> 
                                </span>
                                <div class="span6">
<?php echo $this->Form->text('EstadosMascota.3.observacion', array('class' => 'span12', 'placeholder' => 'Ingresar una Observacion')) ?>
                                </div>
                            </div>
                        </div>

                        <h5>En caso de Extravio</h5>
                        <div class="row-fluid">
                            <div class="span12">

                                <span class="span6">
<?php echo $this->Form->hidden('EstadosMascota.4.id'); ?>
                                <?php echo $this->Form->checkbox('EstadosMascota.4.estado_id'); ?>
                                <?php echo $this->Form->date('EstadosMascota.4.fecha') ?> 
                                </span>
                                <div class="span6">
                                <?php echo $this->Form->text('EstadosMascota.4.observacion', array('class' => 'span12', 'placeholder' => 'Ingresar una Observacion')) ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="span6">
                            <?php echo $this->Form->submit('Guardar y Cerrar', array('class' => 'btn btn-primary span12')); ?>
                            </div>
                            <div class="span6">
                    <?php
                    echo $this->Js->submit('Guardar', array(
                      'url' => array(
                        'action' => 'guardamascota'
                      ),
                      'before' => "$('#imgcargando').toggle();$('#mimodal').toggle();",
                      'update' => '#mimodal',
                      'success' => "$('#imgcargando').toggle(100);$('#mimodal').toggle();",
                      'class' => 'btn btn-success span12'
                      )
                    );
                    ?>
                            </div>
                                <?php echo $this->Form->end() ?>
                        </div>
                    </div>
<?php if (!empty($idMascota)): ?>
                      <br />
                      <div class="row-fluid">
                          <div class="span12">
                              <div class="span4">
                                  <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);
                      $('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'examenes', $idMascota)); ?>');">EXAMENES</a>
                              </div>
                              <div class="span4">
                                  <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);
                      $('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'transferencias', $idMascota)); ?>');">TRANSFERENCIAS</a>
                              </div>
                              <div class="span4">
                                  <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);
                      $('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas', 'action' => 'titulos', $idMascota)); ?>');">TITULOS</a>
                              </div>
                          </div>
                      </div>

                      <div id="examenes" style="display: none;">

                      </div>
                      <div id="imgcargandoopciones" style="display: none;">
  <?php echo $this->Html->image('cargando.gif'); ?>
                      </div>
<?php endif; ?>
                </div>

            </div>
            <!-- // Widget END -->

        </div>
        <!-- // Column END -->



    </div>
</div>

<div class="modal-footer">
</div>

