
<div class="innerLR">
<h3>Listado de Propietarios</h3>
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <?php echo $this->Form->create('Propietario', array('action' => 'ajaxlistado'));?>
        <div class="row-fluid">
        <div class="span12">
        <div class="span5">
        <?php echo $this->Form->text('Propietario.nombre', array('class' => 'span12','placeholder' => 'Nombre del Propietario'));?>
        </div>
        <div class="span5">
        <?php echo $this->form->text('Propietario.ci',array('class' => 'span12','placeholder' => 'C.I. del propietario'));
         ?>
        </div>
        <div class="span2">
        <?php echo $this->Js->submit('Buscar', array('url' => '/Propietarios/ajaxlistado', 'update' => '#listado2', 'class' => 'span12'));
         echo $this->Form->end();?>	
        </div>
        </div>
        </div>
		<div id="listado2">
        <!-- Table -->
            <table id="index2" class="table table-bordered table-white">
                <thead>
                <tr>
                    <th style="width: 80px;">Nro.</th>
                    <th>Nombre del Propietario</th>
                    <th style="width: 150px;">Direccion</th>
                    <th>Telefono</th>
                    <th style="width: 200px;">Tipo</th>
                    <th>Estado</th>
                    <th style="width: 140px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
			<!-- // Table END -->
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
        "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'index.json'));?>",
        //"sDom": 'CRTfrtip'
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                    if ( aData[4] == "socio" )
                    {
                        // color rows from 0-6
                        for (var i = 0; i < 7; i++) {
                            $('td:eq('+i+')', nRow).css("backgroundColor","#d9edf7");
                        }
                    }
                    else{
                        if ( aData[4] == "criador" )
                        {
                            // color rows from 0-6
                            for (var i = 0; i < 7; i++) {
                                $('td:eq('+i+')', nRow).css("backgroundColor","#fcf8e3");
                            }
                        }
                    }
                }
    });
});
function cargadatos(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'propietario'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function paga(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoprop'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function listapaga(aux)
{
    window.location.href = '<?php echo $this->Html->url(array('action' => 'listapagos'))?>/'+aux;
}
function usuario(aux)
{
    $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'usuario'));?>/'+aux,function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
}
function elimina(aux)
{
    if(confirm('Esta seguro de aliminar??')){
        location="<?php echo $this->Html->url(array('action' => 'delete'))?>/"+aux;
    }
}

</script>	
	