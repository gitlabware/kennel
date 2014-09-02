<h3>Mascota</h3>
<div class="innerLR">
<?php echo $this->Form->create('Web',array('action' => 'guardamascota'));?>
    <div class="widget widget-heading-simple widget-body-white">
        <div class="widget-body">
        <h5>Nombre de la Mascota</h5>
                <?php 
                echo $this->Form->hidden('Mascota.id');
                ?>
                <?php echo $this->Form->text('Mascota.nombre', array('placeholder' => 'Nombre de la Mascota', 'required','class' => 'span12')); ?>
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
                <?php echo $this->Form->text('Mascota.kcb', array('placeholder' => 'K c b','class' => 'span12')); ?>
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
                <h5>Fecha Nacimiento</h5>
                <?php echo $this->Form->date('Mascota.fecha_nacimiento', array('placeholder' => 'Click para Insertar Fecha', 'id' => 'date','required','class' => 'span12')); ?>
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
                <div id="divselectpadre">
                <h5>Padre <a href="javascript:" onclick="$('#divselectpadre').toggle(400); $('#divtextpadre').toggle(400); ">Texto</a></h5>
                <div id="divselectpadreajax">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductor_id','divselectpadreajax'));?>');"> <?php echo $this->request->data['Reproductor']['nombre_completo'];?> </a>
                </div>
                <?php //echo $this->Form->select('reproductor_id', $dcm,array('class' => 'selectpicker span12')); ?>
                
                </div>
                <div id="divtextpadre" style="display: none;" >
                <h5>Padre <a href="javascript:" onclick="$('#divtextpadre').toggle(400); $('#divselectpadre').toggle(400);">Seleccion</a></h5>
                <?php echo $this->Form->text('Mascota.padre', array('class' => 'span12')); ?>
                </div>
                <div id="divselectmadre">
                <h5>Madre <a href="javascript:" onclick="$('#divselectmadre').toggle(400); $('#divtextmadre').toggle(400); ">Texto</a></h5>
                <div id="divselectmadreajax">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductora_id','divselectmadreajax'));?>');"> <?php echo $this->request->data['Reproductora']['nombre_completo'];?> </a>
                </div>
                <?php //echo $this->Form->select('reproductora_id', $dcm,array('class' => 'span12')); ?>
                </div>
                <div id="divtextmadre" style="display: none;" >
                <h5>Madre <a href="javascript:" onclick="$('#divtextmadre').toggle(400); $('#divselectmadre').toggle(400);">Seleccion</a></h5>
                <?php echo $this->Form->text('Mascota.madre', array('class' => 'span12')); ?>
                </div>
                
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
                <?php echo $this->Form->text('Mascota.lechigada',array('class' => 'sapn12')); ?>
                </div>
                <div class="span6">
                <h5>Fecha de Emision</h5>
                <?php echo $this->Form->date('Mascota.fecha_emision', array('class' => 'span12', 'placeholder' => 'Click para Insertar Fecha', 'id' => 'fechae')); ?>
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
                
                </div>
                </div>
                </div>
                
                <br />
                <div class="row-fluid">
                  <div class="span12">
                  <div class="span6">
                  <?php echo $this->Html->link('Regresar',array('action' => 'menupropietario'),array('class' => 'btn btn-primary span12'));?>
                  </div>
                  <div class="span6">
                  <?php echo $this->Form->submit('Enviar',array('class' => 'btn btn-primary span12'));?>
                  </div>
                  <?php echo $this->Form->end()?>
                  </div>
                  </div>
                
        </div>
    </div>
</div>