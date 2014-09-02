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
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($departamentos as $depa):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $depa['Departamento']['nombre'];?></td>
						<td>
                        <a href="<?php echo $this->Html->url(array('controller'=>'Departamentos','action' => 'edit', $depa['Departamento']['id']));?>" class="btn-action glyphicons pencil btn-success"><i class="icon-pencil"></i></a>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Departamentos', 'action' => 'delete', $depa['Departamento']['id'])); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>     
                             
                        
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
	