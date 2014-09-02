<h3>Listado de Grupos</h3>
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
						<th>Nombre del Grupo</th>
						<th>Descripcion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($grupos as $gru):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++; ?></td>
						<td><?php echo $gru['Grupo']['nombre'];?></td>
						<td><?php echo $gru['Grupo']['descripcion'];?></td>
						<td>
                                                    <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Grupos','action' => 'ajaxgrupo',$gru['Grupo']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});" title="Editar"><i></i></a>
                                                    <a href="#myModal" data-toggle="modal" class="btn btn-primary btn-xs" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Grupos','action' => 'razas',$gru['Grupo']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});" title="Razas del Grupo"><i class="icon-cog"></i></a>
                        
                                                    <a href="javascript:" onclick="if(confirm('Esta seguro de eliminar???')){window.location = '<?php echo $this->Html->url(array('controller' => 'Grupos', 'action' => 'delete', $gru['Grupo']['id'])); ?>';}" class="btn btn-danger btn-xs" title="Eliminar"><i class="icon-trash"></i></a>     
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
	