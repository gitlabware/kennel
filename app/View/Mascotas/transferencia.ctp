<?php echo $this->Form->create('Mascota');?>
<div id="selectprop">

<h5>Nombre del propietario transferido <a href="javascript:" onclick="$('#selectprop').toggle(400);$('#formuprop').toggle(400);"> Nuevo Propietario</a></h5>
<div id="divselectpropajaxx">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Mascotaspropietario.propietario_id','divselectpropajaxx'));?>');"><?php if(!empty($this->request->data['Propietario']['nombre'])){echo $this->request->data['Propietario']['nombre'];}else{echo 'SELECCIONE PROPIETARIO';}?> </a>
</div>
<?php //echo $this->Form->select('Mascotaspropietario.propietario_id',$propietarios,array('class' => 'span12'));?>
<?php echo $this->Form->hidden('Mascotaspropietario.id');?>
</div>

<div id="formuprop" style="display: none;">
<h5>Nombre Propietario <a href="javascript:" onclick="$('#formuprop').toggle(400);$('#selectprop').toggle(400);"> Seleccionar Propietario</a></h5>
<?php echo $this->Form->text('Propietario.nombre_aux',array('class' => 'span12'));?>
<h5>Direccion Propietario</h5>
<?php echo $this->Form->text('Propietario.direccion_aux',array('class' => 'span12'));?> 
<h5>Telefono</h5>
<?php echo $this->Form->text('Propietario.telefono1_aux',array('class' => 'span12'));?>

</div>
<div class="row-fluid">
<div class="span12">
<div class="span6">
    <h5>Fecha de transferencia (A&ntilde;o-mes-dia)</h5>
<?php echo $this->Form->text('Mascotaspropietario.fecha_transfer',array('class' => 'span12','id' => 'idfecha_transfer'));?>

     <script>
                $(function(){
                    $("#idfecha_transfer").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>

</div>
<div class="span6">
<h5>Estado</h5>
<?php echo $this->Form->select('Mascotaspropietario.estado',array(0 => 'Propietario Anterior',1 => 'Propietario Actual'),array('class' => 'span12'));?>
</div>
</div>
</div>

<h5>En caso de ser Pedigree de exportacion  (A&ntilde;o-mes-dia)</h5>
<div class="row-fluid">
<div class="span12">
<span class="span6">

<?php echo $this->Form->checkbox('Mascotaspropietario.pedigree_exportacion');?>
<?php echo $this->Form->text('Mascotaspropietario.fecha_exportacion',array('id' => 'idfecha_exportacion')) ?> 
    <script>
                $(function(){
                    $("#idfecha_exportacion").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
</span>
<div class="span6">
<?php echo $this->Form->text('Mascotaspropietario.pais_destino',array('class' =>'span12','placeholder' => 'Ingresar el Pais destino')) ?>
</div>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<div class="span6">

</div>
<div class="span3">
<a href="javascript:" class="btn btn-block btn-warning span12" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'transferencias',$idMascota));?>');">Cancelar</a>
</div>
<div class="span3">
<?php 
                    echo $this->Js->submit('Guardar', array(
                        'url' => array(
                            'action' => 'guardatransferencia',$idMascota
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
