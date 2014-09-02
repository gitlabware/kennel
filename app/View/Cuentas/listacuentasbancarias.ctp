<h3>Listado de Cuentas</h3>
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
						<th>Cuenta</th>
                        <th>Sucursal</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($cuentas as $cu):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $cu['Cuentasbancaria']['cuenta'];?></td>
                        <td><?php echo $cu['Sucursale']['nombre'];?></td>
						<td>
                        <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'nuevacuentabancaria',$cu['Cuentasbancaria']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                        
                        <a href="<?php echo $this->Html->url(array('controller' => 'Cuentas', 'action' => 'eliminacuentab', $cu['Cuentasbancaria']['id'])); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>     
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
	