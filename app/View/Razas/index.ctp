
<div class="innerLR">
<h3>Listado de Razas</h3>
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		
			<!-- Table -->
			<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Raza</th>
						<th>Descripcion</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php foreach($razas as $ra):?>
					<tr class="gradeA">
						<td><?php echo $ra['Raza']['nombre'];?></td>
						<td><?php echo $ra['Raza']['descripcion'];?></td>
						<td>
                        <a class="label label-info" href="#myModal" data-toggle="modal"  onclick="$('#myModal').load('<?php echo $this->Html->url(array('action' => 'ajaxraza',$ra['Raza']['id']));?>');">Editar</a> 
                        <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$ra['Raza']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'label label-important'));?>
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
	
