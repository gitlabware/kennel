<h3>Listado de Eventos</h3>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
		<div class="row-fluid">
        <div class="span12">        
        <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'reportesanuales'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">REPORTES ANUALES</a>
        </div>
        </div>
			<!-- Table -->
			<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Desde</th>
                        <th>Hasta</th>                                     
                        <th>Acciones</th> 
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                
                <?php foreach ($eventos as $e): ?>
                        <?php $id = $e['Evento']['id']; ?>
                        <tr class="gradeA">                            
                            <td><?php echo $e['Evento']['nombre']; ?></td>
                            <td><?php echo $e['Evento']['ciudad']; ?></td>
                            <td><?php echo $e['Evento']['fecha_inicio']; ?></td>  
                            <td><?php echo $e['Evento']['fecha_fin']; ?></td>                            
                            <td>
                                <?php
                                echo $this->Html->link('<i></i>', array('action' => 'exposicion', $id), array('class' => 'btn-action glyphicons pencil btn-primary','title' => 'Editar','escape' => false));
                                ?>
                                <?php
                                echo $this->Html->link('<i></i>', array('action' => 'exporeporte', $id,0), array('class' => 'btn-action glyphicons eye_open btn-inverse','title' => 'Ver Evento','escape' => false));
                                ?>
                                <a href="#myModal" data-toggle="modal" title="Reportes" class="btn-action glyphicons notes btn-primary" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'reporte',$id));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                                <?php echo $this->Html->link('<i></i>',array('action' => 'delete',$e['Evento']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'btn-action glyphicons circle_remove btn-danger','title' => 'Eliminar'));?>
                                <?php
                                //echo $this->Html->link('Puntajes', array('action' => 'reportegeneral', $id), array('class' => 'label label-inverse'));
                                ?>
                                <?php 
                                if($e['Evento']['estado'] == 1)
                                {
                                    echo $this->Html->link('<i></i>', array('action' => 'cambia_estado', $id), array('class' => 'btn-action glyphicons ban btn-success','title' => 'Deshabilitar','escape' => false));
                                }
                                else{
                                    echo $this->Html->link('<i></i>', array('action' => 'cambia_estado', $id), array('class' => 'btn-action glyphicons ok btn-warning','title' => 'Habilitar','escape' => false));
                                }
                                ?>
                                <?php echo $this->Html->link('<i></i>',array('action' => 'catalogo_inicial',$id),array('class' => 'btn-action glyphicons book_open btn-inverse','escape' => false,'title' => 'Catalogo Inicial'));?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
				<!-- // Table body END -->
				
			</table>
			<!-- // Table END -->
			
		</div>
	</div>
	
</div>	
	
<script>
$('.dynamicTable.tableTools').dataTable({
	"aaSorting": [] 
});
</script>
