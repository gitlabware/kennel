<h3>Listado de Mascotas Pendientes</h3>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
                <tr>
                    <th>Nro KCB</th>
                    <th>Ejemplar</th>
                    <th>Nro tatoo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                
            <tbody>
            <?php if(!empty($mascotas)):?>
                        <?php foreach($mascotas as $m):?>
                        <tr>
                            <td><?php echo $m['Mascota']['kcb']?></td>
                            <td id="fila<?php echo $m['Mascota']['id']?>">
                            <div id="cfila<?php echo $m['Mascota']['id']?>">
                            <?php echo $m['Mascota']['nombre_completo']; ?>
                            </div>
                             </td>
                            <td><?php echo $m['Mascota']['num_tatuaje']?></td>
                            <td class="center">
                                <?php echo $m['Propietarioactual']['nombre']?>
                            </td>
                            <td class="hidden-print">
                            <?php $estado = $m['Mascota']['estado'];?>
                            <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxmascota',$m['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
                            
                             <a href="<?php echo $this->Html->url(array('action' => 'ver', $m['Mascota']['id'])); ?>" class="label label-warning">Ver</a> 
                             <?php echo $this->Html->link('Aceptar',array('action' => 'aceptar',$m['Mascota']['id']),array('class' => 'label label-success'));?>
                             <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$m['Mascota']['id']),array('escape' => false,'confirm' => 'Si tiene registros con esta mascota podria causar errores!!! Esta seguro de eliminar','class' => 'label label-important'));?>
                             
                            </td>
                        </tr>
                        
                        <?php endforeach;?>
                        <?php endif;?>
                  </tbody>  
            </table>
        </div>
    </div>
</div>
