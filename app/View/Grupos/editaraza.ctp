<h3>Editar razas <?php echo $grupo['Grupo']['nombre']; ?></h3>
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
						<th>Raza</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                            <?php $i = 1; ?>
                        <?php if(!empty($gruporazas)): ?>
                    <?php foreach($gruporazas as $grupo): ?>
					<tr class="gradeA">
                        <td><?php echo $i; $i++;?></td>
						<td><?php echo $grupo['Raza']['nombre'];?></td>
						<td>
                        <a href="<?php echo $this->Html->url(array('controller'=>'Grupos','action' => 'editraza', $grupo['GruposRaza']['id']));?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Grupos', 'action' => 'eliminaraza', $grupo['GruposRaza']['id'])); ?>" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>     
                        </td>
					</tr>	
				    <?php endforeach;?> 
                        <?php endif; ?>
				</tbody>
				<!-- // Table body END -->
				
			</table>
			<!-- // Table END -->
            <div class="actions">
   <div class="actions-left">
   <?php echo $this->Html->link('ANADIR NUEVA RAZA', array('action' =>'anaderazas',$id), array('class' => 'btn btn-icon btn-primary glyphicons circle_ok'));?>
   </div>
  </div>
			
		</div>
	</div>
</div>	

	