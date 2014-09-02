<?php if(!empty($propietarios)):?>
<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
			
				<!-- Table heading -->
				<thead>
					<tr>
                        <th>Nro.</th>
						<th>Nombre del Propietario</th>
                                                <th>C.I.</th>
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
                                    <?php 
                                    $backcolor = '';
                                    if($prop['Tipo']['nombre'] == 'socio')
                                    {
                                        $backcolor = 'style="background-color: #d9edf7;"';
                                    }
                                    elseif($prop['Tipo']['nombre'] == 'criador'){
                                        $backcolor = 'style="background-color: #fcf8e3;"';
                                    }
                                    ?>
					<tr class="gradeA">
                                            <td <?php echo $backcolor;?>><?php echo $i; $i++;?></td>
						<td <?php echo $backcolor;?>><?php echo $prop['Propietario']['nombre'];?></td>
                                                <td <?php echo $backcolor;?>><?php echo $prop['Propietario']['ci'];?></td>
						<td <?php echo $backcolor;?>><?php echo $prop['Propietario']['direccion'];?></td>
                        <td <?php echo $backcolor;?>><?php echo $prop['Propietario']['telefono1'];?></td>
                        <?php
                            $estado = $prop['Propietario']['estado'];
                            if ($estado == 1):
                                $descestado = "HABILITADO";
                            else:
                                $descestado = "DESHABILITADO";
                            endif;
                            ?>  
                        <td <?php echo $backcolor;?>><span <?php echo fmod($estado, 2) ? "class = deshabilitado" : "habilitado"; ?>><?php echo $descestado; ?></span></td>
						<td>
                        <a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'propietario',$prop['Propietario']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i class="icon-pencil"></i></a>
                        <?php echo $this->Html->link('<i class="icon-trash"></i>',array('action' => 'delete',$prop['Propietario']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'btn btn-danger btn-xs'));?>     
                        <a href="#myModal" data-toggle="modal" class="btn-action glyphicons usd btn-primary" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoprop',$prop['Propietario']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                        <a href="javascript:" class="btn-action glyphicons coins btn-inverse" onclick="window.location.href = '<?php echo $this->Html->url(array('action' => 'listapagos',$prop['Propietario']['id']))?>'"><i></i></a>
                        <a  href="#myModal" data-toggle="modal"  href="javascript:" class="btn-action glyphicons user btn-primary" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'usuario',$prop['Propietario']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                        </td>
					</tr>	
				<?php endforeach;?>	
				</tbody>
				<!-- // Table body END -->
				
			</table>
<?php else:?>
<h3 style="color: red;">No se encontro resultados!!!!</h3>
<?php endif;?>