
<?php if($mascotas != null):?>

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
                            
                            <a href="<?php echo $this->Html->url(array('action' => 'ver', $m['Mascota']['id'])); ?>" class="label label-warning">Ver</a> 
                             
                            </td>
                        </tr>
                        
                        <?php endforeach;?>
                  </tbody>  
            </table>
<?php else:?>
<h3 style="color: red;">No se encontro resultados!!!!</h3>
<?php endif;?>
