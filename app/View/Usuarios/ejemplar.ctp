
<div class="innerL">
    <h3>FORMULARIO EJEMPLAR</h3>
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <?php echo $this->Form->create('Usuario',array('action' => 'guardaejemplar','id' => 'fooo'));?>
            <div class="row-fluid">
	
		<!-- Column -->
        
		<div class="span12">
		
            <!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                                    
                                    <h5>Nombre de la Mascota</h5>
                <?php
                echo $this->Form->hidden('Mascota.id');
                ?>
                <?php echo $this->Form->text('Mascota.nombre', array('placeholder' => 'Nombre de la Mascota','class' => 'span12')); ?>
                
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Prefijo nombre (Sea el caso)</h5>
                <?php echo $this->Form->text('Mascota.prefijo', array('placeholder' => 'Prefijo Nombre','class' => 'span12')); ?>
                </div>
                <div class="span6">
                <h5>Primero en mostrar</h5>
                <?php echo $this->Form->select('Mascota.orden', array('0' => 'nombre', '1' => 'afijo'),array('class' => 'span12')); ?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Kcb</h5>
                <?php echo $this->Form->text('Mascota.kcb', array('placeholder' => 'K c b','class' => 'span12','required' => 'false')); ?>
                </div>
                <div class="span6">
                <h5>Numero de tatuaje</h5>
                <?php echo $this->Form->text('Mascota.num_tatuaje', array('placeholder' => 'Numero de Tatuaje','class' => 'span12')); ?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Numero de Chip</h5>
                <?php echo $this->Form->text('Mascota.chip', array('placeholder' => 'Numero de Chip','class' => 'span12')); ?>
                </div>
                <div class="span6">
                    <h5><span style=" color: red">*</span>Fecha Nacimiento (A&ntilde;o-mes-dia)</h5>
               
                    <?php echo $this->Form->text('Mascota.fecha_nacimiento', array('placeholder' => '____-__-__', 'id' => 'fechanac','required' => 'false','class' => 'span12')); ?>
                <script>
                $(function(){
                    $("#fechanac").inputmask("y-m-d", {});
                });
                </script>
                </div>
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
                <h5>Raza</h5>
                
                <?php echo $this->Form->select('Mascota.raza_id',$razas,array('required','id' =>'selecraza','class' => 'span12'));?>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Variedad</h5>
                <?php echo $this->Form->text('Mascota.variedad', array('placeholder' => 'Nombre Completo','class' =>'span12')) ?>
                </div>
                <div class="span6">
                <h5>Sexo</h5>
                <?php $dcs = array('macho' => 'Macho', 'hembra' => 'Hembra'); ?>
                <?php echo $this->Form->select('Mascota.sexo', $dcs, array('class' => 'span12','required')); ?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-warning span12" onclick="$('#imgcargandosele').toggle();$('#modalsele').toggle();$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxextranjero',$idMascota));?>',function(){$('#imgcargandosele').toggle(100);$('#modalsele').toggle();});">Registro rapido de Nuevo Extranjero</a>
                        
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div id="nuevoextranjero"></div>
                    </div>
                </div>
                <div id="divselectpadre">
                    <h5>Padre <span style=" color: blue">Nota: Es necesario que el padre este registrado previamente</span></h5>
                <div id="divselectpadreajax">
                    <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductor_id','divselectpadreajax'));?>');"> <?php if(!empty( $this->request->data['Reproductor']['nombre_completo'])){echo  $this->request->data['Reproductor']['nombre_completo'];}else{ echo 'Seleccione al Padre';}?> </a>
                </div>
                <?php //echo $this->Form->select('reproductor_id', $dcm,array('class' => 'selectpicker span12')); ?>
                
                </div>
                
                <div id="divselectmadre">
                <h5>Madre <span style=" color: blue">Nota: Es necesario que la madre este registrada previamente</span></h5>
                <div id="divselectmadreajax">
                    <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductora_id','divselectmadreajax'));?>');"> <?php if(!empty($this->request->data['Reproductora']['nombre_completo'])){echo $this->request->data['Reproductora']['nombre_completo'];}else{echo 'Seleccione a la Madre';}?> </a>
                </div>
                <?php //echo $this->Form->select('reproductora_id', $dcm,array('class' => 'span12')); ?>
                </div>
                
                <?php echo $this->Form->hidden('Mascota.propietarioactual_id',array('value' => $this->Session->read('Auth.User.propietario_id')));?>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Afijo</h5>
                <?php echo $this->Form->select('Mascota.criadero_id', $criaderos,array('class' => 'span12')); ?>
                </div>
                <div class="span6">
                <h5>Lugar</h5>
                <?php echo $this->Form->select('Mascota.departamento_id', $departamentos, array('class' => 'span12')); ?>
                </div>
                </div>
                </div>
                <h5>Consanguinidad</h5>
                <?php echo $this->Form->text('Mascota.consanguinidad', array('placeholder' => 'Insertar Consanguinidad','class' => 'span12')); ?>
                <h5>Hermano</h5>
                <?php echo $this->Form->textarea('Mascota.hermano', array('placeholder' => 'Insertar al hermano','class' => 'span12')); ?>
  				<div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Lechigada</h5>
                <?php echo $this->Form->text('Mascota.lechigada',array('class' => 'span12')); ?>
                </div>
                <div class="span6">
                    <h5>Fecha de Emision (A&ntilde;o-mes-dia)</h5>
                <?php echo $this->Form->text('Mascota.fecha_emision', array('placeholder' => '____-__-__', 'id' => 'fechaemi','class' => 'span12')); ?>
                <script>
                $(function(){
                    $("#fechaemi").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
                </div>
                </div>
                </div>
                
                <div class="center"><h5><b>En caso de ser extranjero</b></h5></div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Origen</h5>
                <?php echo $this->Form->text('Mascota.origen', array('placeholder' => 'origen del extranjero','class' =>'span12')); ?>
                </div>
                <div class="span6">
                <h5>Codigo o Registro</h5>
                <?php echo $this->Form->text('Mascota.codigo', array('placeholder' => 'Codigo del extranjero','class' => 'span12')); ?>
                </div>
                </div>
                
                </div>
                
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <h5>Ciudad/Pais (Lugar)</h5>
                <?php echo $this->Form->text('Mascota.lugar_extranjero', array('placeholder' => 'Ciudad/pais del extranjero','class' =>'span12')); ?>
                </div>
                <div class="span6">
                <h5>Titulos (Extranjero)</h5>
                <?php echo $this->Form->hidden('Mascota.titulos_ex',array('id' => 'titulos_ex','style' => 'width: 100%'))?>
					<div class="separator bottom"></div>
                                        <script>
                                            $(function()
                                            {
                                                $("#titulos_ex").select2({tags:[]});
                                            });
                                            </script>
                </div>
                </div>
                </div>
                
                <?php if(!empty($idMascota)):?>
                <br />
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);$('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'examenes',$idMascota));?>');">EXAMENES</a>
                </div>
                <div class="span4">
                <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);$('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'transferencias',$idMascota));?>');">TRANSFERENCIAS</a>
                </div>
                <div class="span4">
                <a href="javascript:" class="btn btn-block btn-inverse" onclick="$('#examenes').show(400);$('#examenes').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'titulos',$idMascota));?>');">TITULOS</a>
                </div>
                </div>
                </div>
                
                <div id="examenes" style="display: none;">
                
                </div>
                <div id="imgcargandoopciones" style="display: none;">
                  <?php echo $this->Html->image('cargando.gif');?>
                </div>
                <?php endif;?>
                
                <br />
                <div class="row-fluid">
                  <div class="span12">
                      <script>
                      
                      </script>
                  <?php echo $this->Form->submit('Registrar',array('class' => 'btn btn-primary span12 boton'));?>
                  
                  <?php echo $this->Form->end()?>
                  </div>
                  </div>
                
                </div>
                
            </div>
			<!-- // Widget END -->
			
		</div>
		<!-- // Column END -->
		
		
		
	</div>
        </div>
    </div>
</div>

