
<div class="innerLR">
<h3>Listado de Criaderos</h3>
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		
			<!-- Table -->
            <table id="index2" class="table table-bordered table-white">
                <thead>
                <tr>
                    <th style="width: 80px;">FCI</th>
                    <th>Fecha</th>
                    <th style="width: 230px;">Nombre</th>
                    <th>Propietario</th>
                    <th>Celular</th>
                    <th >Departamento</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
            
                </tbody>
            </table>
			<!-- // Table END -->
			
		</div>
	</div>
	
<script>
$(function() {
    // basic usage see app/Controllers/CitiesController::index
    $('#index2').dataTable({
        "iDisplayLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'index.json'));?>",
        //"sDom": 'CRTfrtip'
    });
});
function cargadatos(aux,num)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'editar'));?>/'+aux+'/'+num,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function cargarazas(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'razas'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function cargarecomendaciones(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Criaderos','action' => 'recomendaciones'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function inspeccion(aux)
{
    location="<?php echo $this->Html->url(array('action' => 'ver'));?>/"+aux;
}
function inspeccion2(aux,ins)
{
    location="<?php echo $this->Html->url(array('action' => 'inspeccion'));?>/"+aux+'/'+ins;
}
function verinspeccion(aux)
{
    location="<?php echo $this->Html->url(array('action' => 'inspeccion'));?>/"+aux;
}
function verinspeccion2(aux)
{
    location="<?php echo $this->Html->url(array('action' => 'verinspeccion'));?>/"+aux;
}
function elimina(aux)
{
    if(confirm('Esta seguro de eliminar??')){
        location="<?php echo $this->Html->url(array('action' => 'eliminar'));?>/"+aux;
    }
}

</script>
	
</div>	
	