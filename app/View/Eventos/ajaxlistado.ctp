
<div class="widget widget-heading-simple widget-body-gray">
<?php if (empty($mascotas)):?>
<h3 style="color:#F00">LA BUSQUEDA NO DIO RESULTADOS!!!</h3>
<?php else:?>
<h3>INSCRIBIR A...</h3>
		
			<!-- Table -->
			<div class="widget-body" >
		
			<!-- Table -->
			
            <table class="table table-bordered table-striped table-white">
                <thead>
                    <tr>
                        <th>Nro KCB</th>
                        <th>Ejemplar</th>
                        <th>Raza</th>
                        <th>Propietario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mascotas as $m): ?>
                    
                        <tr>
                            <td><?php echo $m['Mascota']['kcb'] ?></td>
                            <td><?php echo $m['Mascota']['nombre_completo']; ?></td>
                            <td><?php echo $m['Raza']['nombre'] ?></td>
                            <td>
                                <?php echo $m['Propietarioactual']['nombre'] ?>
                            </td>
                            <td>
                            <a class="label label-info" href="#myModal" data-toggle="modal" class="glyphicons credit_card" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller'=>'Eventos', 'action'=>'ajaxformulario',$m['Mascota']['id'],$idEvento));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i>INSCRIBIR</a>
                            <?php //echo $this->Js->link('INSCRIBIR',array('controller'=>'Eventos', 'action'=>'ajaxformulario',$m['Mascota']['id'],$idEvento), array('update'=>'#myModal','class'=>'label label-info','id'=>'formularioa'.$m['Mascota']['id']));?>
                            
                            </td>
                        </tr>
            <?php endforeach; ?>
                </tbody>
            </table>
			<!-- // Table END -->
			
		</div>
		<?php endif;?>
	</div>
    
