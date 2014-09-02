<?php
App::Import('Model', 'Generacione');
$generacion = new Generacione();
?>
<?php if($mascotas != null):?>

        <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
                <tr>
                    <th>Nro KCB</th>
                    <th>Ejemplar</th>
                    <th>Nro tatoo</th>
                    <th>Raza</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                
            <tbody>
                        <?php foreach($mascotas as $m):?>
                        <tr>
                            <td><?php echo $m['Mascota']['kcb']?></td>
                            <td id="fila<?php echo $m['Mascota']['id']?>">
                            <div id="cfila<?php echo $m['Mascota']['id']?>">
                            <?php echo $m['Mascota']['nombre_completo']; ?>
                            </div>
                             </td>
                            <td><?php echo $m['Mascota']['num_tatuaje']?></td>
                            <td><?php echo $m['Raza']['nombre'];?></td>
                            <td class="center">
                                <?php echo $m['Propietarioactual']['nombre']?>
                            </td>
                            <td class="hidden-print">
                            <?php if($this->Session->read('Auth.User.role') == 'administrador'):?>
                            <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxmascota',$m['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
                            <?php echo $this->Html->link('Generaciones',array('action' => 'generaciones',$m['Mascota']['id']),array('class' => 'label label-warning'));?>
                             
                             <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$m['Mascota']['id']),array('escape' => false,'confirm' => 'Si tiene registros con esta mascota podria causar errores!!! Esta seguro de eliminar','class' => 'label label-important'));?>
                             <?php endif;?>
                             <a href="<?php echo $this->Html->url(array('action' => 'ver', $m['Mascota']['id'])); ?>" class="label label-warning">Ver</a> 
                            </td>
                        </tr>
                        
                        <?php endforeach;?>
                  </tbody>  
            </table>
<?php else:?>
<h3 style="color: red;">No se encontro resultados!!!!</h3>
<?php endif;?>
