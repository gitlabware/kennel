<h3>Listado de Sucursales</h3>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		
			<!-- Table -->
			<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
                        <th>Nro.</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($sucursales as $su):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $su['Sucursale']['nombre'];?></td>
						<td>
                                                    <a title="editar" href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'nuevasucursal',$su['Sucursale']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                        
                                                    <a href="javascript:" onclick="if(confirm('Esta seguro de eliminar la sucursal???')){window.location = '<?php echo $this->Html->url(array('controller' => 'Cuentas', 'action' => 'eliminasucursal', $su['Sucursale']['id'])); ?>';}" class="btn btn-danger btn-xs" title="eliminar"><i class="icon-trash"></i></a>     
                        </td>
					</tr>	
				<?php endforeach;?>	
				</tbody>
				<!-- // Table body END -->
				
			</table>
			<!-- // Table END -->
			
		</div>
	</div>
	

	
</div>	
	