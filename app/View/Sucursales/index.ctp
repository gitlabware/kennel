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
						<th>Sucursal</th>
						<th>Direccion</th>
                        <th>Telefono</th>
						<th>Celular</th>
						<th>Departamento</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($sucursales as $sucur):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $sucur['Sucursale']['nombre'];?></td>
						<td><?php echo $sucur['Sucursale']['direccion'];?></td>
                        <td><?php echo $sucur['Sucursale']['telefono'];?></td>
						<td><?php echo $sucur['Sucursale']['celular'];?></td>
                        <td><?php echo $sucur['Sucursale']['nombre'];?></td>
						<td>
                        <a href="<?php echo $this->Html->url(array('controller'=>'Sucursales','action' => 'edit', $sucur['Sucursale']['id']));?>" class="btn-action glyphicons pencil btn-success"><i class="icon-pencil"></i></a>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Sucursales', 'action' => 'delete', $sucur['Sucursale']['id'])); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>     
                             
                        
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
	