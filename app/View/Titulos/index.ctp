<h3>Listado de Titulos</h3>
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
                                                <th>Descripcion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				<!-- Table body -->
				<tbody>
                
                <?php $i = 1; ?>
                <?php foreach($titulos as $titu):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $titu['Titulo']['nombre'];?></td>
                                                <td><?php echo $titu['Titulo']['descripcion'];?></td>
						<td>
                                                    <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Titulos','action' => 'ajaxtitulo',$titu['Titulo']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});" title="Editar"><i></i></a>
                                                    <a href="javascript:" onclick="if(confirm('Esta seguro de eliminar???')){window.location = '<?php echo $this->Html->url(array('controller' => 'Titulos', 'action' => 'delete', $titu['Titulo']['id'])); ?>';}" class="btn btn-danger btn-xs" title="Eliminar"><i class="icon-trash"></i></a>     
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
	