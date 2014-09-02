<h3>Listado de Propietarios pendientes</h3>
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
						<th>Nombre del Propietario</th>
						<th>Direccion</th>
                        <th>Telefono</th>
                        <th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php $i = 1; ?>
                <?php foreach($propietarios as $prop):?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $prop['Propietario']['nombre'];?></td>
						<td><?php echo $prop['Propietario']['direccion'];?></td>
                        <td><?php echo $prop['Propietario']['telefono1'];?></td>
                        <?php
                            $estado = $prop['Propietario']['estado'];
                            if ($estado == 1):
                                $descestado = "HABILITADO";
                            else:
                                $descestado = "DESHABILITADO";
                            endif;
                            ?>  
                        <td><span <?php echo fmod($estado, 2) ? "class = deshabilitado" : "habilitado"; ?>><?php echo $descestado; ?></span></td>
						<td>
                        <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'propietario',$prop['Propietario']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i class="icon-pencil"></i></a>
                        <?php echo $this->Html->link('<i class="icon-trash"></i>',array('action' => 'delete',$prop['Propietario']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'btn btn-danger btn-xs'));?>     
                        
                        <?php echo $this->Html->link('Aceptar',array('action' => 'aceptar',$prop['Propietario']['id']),array('class' => 'label label-success'));?>
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
	