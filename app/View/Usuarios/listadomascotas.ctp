<div class="innerLR">
<h3>Listado de Ejemplares</h3>
<div class="widget widget-heading-simple widget-body-gray">
<div class="widget-body">
<?php echo $this->Form->create('Mascota')?>
        <div class="row-fluid">
        <div class="span12">
        <div class="span3">
        <?php echo $this->Form->text('Mascota.nombre',array('id' => 'idnombre','class' => 'span12','placeholder'=>'Nombre de Mascota')); ?>
        </div>
        <div class="span4">
        <?php echo $this->form->select('Mascota.raza_id',$razas,array('id' => 'idraza','class' => 'span12','data-placeholder' => 'Seleccione la Raza')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.kcb',array('id' => 'idkcb','class' => 'span12','placeholder'=>'kcb')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.num_tatuaje',array('id' => 'idnum_tatuaje','class' => 'span12','placeholder'=>'Tatuaje')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.chip',array('id' => 'idchip','class' => 'span12','placeholder'=>'Chip')); ?>
        </div>
        <div class="span2">
        <?php echo $this->form->date('Mascota.fecha_nacimiento',array('id' => 'idfecha_nacimiento','class' => 'span12','placeholder'=>'Fecha de Nacimiento')); ?>
        </div>
        
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <div id="divselectpropajax2">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Mascota.propietario_id','divselectpropajax2'));?>');">SELECCIONE EL PROPIETARIO </a>
        </div>
        <?php //echo $this->Form->select('Mascota.propietario_id',$propietarios,array('class' => 'span12'));?>
        </div>
        <div class="span6">
        <?php
                        echo $this->Js->submit('Buscar', array('url' => '/Mascotas/ajaxlistado', 'update' => '#listado2','class' => 'btn btn-block btn-success'));
                        
                        ?>
        </div>
        </div>
        </div>
        <?php echo $this->Form->end();?>
<div class="row-fluid">
<div id="listado2">
<table id="index2" class="table table-bordered table-white">
    <thead>
    <tr>
        <th style="width: 90px;">nro KCB</th>
        <th>Ejemplar</th>
        <th style="width: 50px;">nro Tatoo</th>
        <th>Raza</th>
        <th style="width: 200px;">Proietario</th>
        <th style="width: 140px;">Acciones</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>

</div>
</div>
</div>
</div>

<script>
$(function() {
    // basic usage see app/Controllers/CitiesController::index
    $('#index2').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'listadomascotas.json'));?>",
        //"sDom": 'CRTfrtip'
    });
});
function cargadatos(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxmascota'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function elimina(aux)
{
    if(confirm('Esta seguro de aliminar??')){
        location="<?php echo $this->Html->url(array('action' => 'elimina'))?>/"+aux;
    }
}
function generaciones(aux)
{
    location="<?php echo $this->Html->url(array('action' => 'generaciones'));?>/"+aux;
}
function ver(aux)
{
    location = "<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ver'))?>/"+aux;
}
$(function()
{
	$("#idraza").select2({
		allowClear: true
	});
});
	
</script>