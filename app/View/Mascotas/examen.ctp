<?php echo $this->Form->create('Mascota');?>
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h5>Examen</h5>
<?php echo $this->Form->select('Examenesmascota.examene_id',$examenes,array('class' =>'span12','required'));?>
<?php echo $this->Form->hidden('Examenesmascota.id');?>
</div>
<div class="span6">
<h5>Fecha del Examen  (A&ntilde;o-mes-dia)</h5>
<?php echo $this->Form->text('Examenesmascota.fecha_examen',array('class' => 'span12','id' => 'idfecha_examen'));?>
<script>
                $(function(){
                    $("#idfecha_examen").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
</div>
</div>
</div>
<h5>Medico (en caso de tener)</h5>
<?php echo $this->Form->text('Examenesmascota.revisor', array('placeholder' => 'Insertar una Descripcion','class'=>'span12'));?>
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h5>Resultado</h5>
<?php echo $this->Form->textarea('Examenesmascota.resultado',array('class' => 'span12')); ?>
</div>
<div class="span6">
<h5>Observaciones</h5>
<?php echo $this->Form->textarea('Examenesmascota.observacion',array('class' => 'span12'));?>
</div>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h5># formulario</h5>
<?php echo $this->Form->text('Examenesmascota.numero_formulario',array('class' => 'span12'))?>    
</div>
<!--
<div class="span4">
<h5>Grado examen</h5>
<?php //echo $this->Form->text('Examenesmascota.examen',array('class' => 'span12'))?>
</div>
-->
<div class="span6">
<h5>Codigo DFC</h5>
<?php echo $this->Form->text('Examenesmascota.dcf',array('class' => 'span12'))?>  
</div>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h5>Con firmas correspondientes</h5>
<?php echo $this->Form->checkbox('Examenesmascota.firma');?>
</div>
<div class="span3">
<a href="javascript:" class="btn btn-block btn-warning span12" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'examenes',$idMascota));?>');">Cancelar</a>
</div>
<div class="span3">
<?php 
                    echo $this->Js->submit('Guardar', array(
                        'url' => array(
                            'action' => 'guardaexamen',$idMascota
                        ),
                        'before' => "$('#imgcargandoopciones').toggle();$('#examenes').toggle();",
                        'update' => '#examenes',
                        'success' => "$('#imgcargandoopciones').toggle(100);$('#examenes').toggle();",
                        'class' => 'btn btn-success span12'
                    )
                );
                    ?>
</div>
</div>
</div>
<?php echo $this->Form->end()?>
