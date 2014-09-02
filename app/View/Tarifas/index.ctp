<div class="innerLR">
<h3>Listado de Tarifas</h3>
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		
			<!-- Table -->
			<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
                        <th>Nro.</th>
						<th>Categoria</th>
						<th>Tarifa</th>
						<th>Monto Total</th>
                        <th>Oficina Nacional</th>
						<th>Regional</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($tarifas as $tari):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $tari['Tramite']['Categoriastarifa']['nombre'];?></td>
						<td><?php echo $tari['Tramite']['nombre'];?></td>
                        <td><?php echo $tari['Tarifa']['monto_total'];?></td>
                        <td><?php echo $tari['Tarifa']['nacional'];?></td>
                        <td><?php echo $tari['Tarifa']['regional'];?></td>
						<td>
                        
                                                    <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Tarifas','action' => 'ajaxtarifa',$tari['Tarifa']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});" title="Editar"><i></i></a>     
                                                    <a href="javascript:" class="btn btn-danger btn-xs" onclick="if(confirm('Esta seguro de eliminar???')){window.location = '<?php echo $this->Html->url(array('controller' => 'Tarifas', 'action' => 'delete', $tari['Tarifa']['id'])); ?>';}" title="Eliminar"><i class="icon-trash"></i></a>     
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
	
