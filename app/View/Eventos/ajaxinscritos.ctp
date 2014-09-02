<div class="widget widget-heading-simple widget-body-gray">
<div class="widget-body" >
<?php
App::Import('Model', 'EventosMascota');
$evenmas = new EventosMascota();
?>
<?php if(!empty($mensajeb)):?>
<h2 style="color:#093"><?php echo $mensajeb?></h2>
<?php endif;?>
<?php if(!empty($mensajem)):?>
<h2 style="color:#F00"><?php echo $mensajem?></h2>
<?php endif;?>
<!--escribir aca -->
<?php echo $this->Form->create('EventosMascota',array('action' => 'ajaxmejorescachorros',$idEvento));?>
                                        <?php $j = 0;?>
                                            <?php foreach($cate as $c):?>
                                            <?php $inscritos = $evenmas->find('all',array('recursive' => 2,'conditions' => array('EventosMascota.categoriaspista_id' => $c['Categoriaspista']['id'],'EventosMascota.evento_id' => $idEvento)));
                                                //debug($inscritos);exit;
                                                if(!empty($inscritos)):
                                            ?>
                                                    
                                            <h3><?php echo $c['Categoriaspista']['nombre']?></h3>
                                            
                                            <table class="table table-bordered table-striped table-white">
                                                <thead>
                                                    <tr>
                                                        <th>Nro KCB</th>
                                                        <th>Ejemplar</th>
                                                        <th>Catalogo</th>
                                                        <th>Raza</th>
                                                        <th>Propietario</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    <?php foreach ($inscritos as $m): $j++;?>
                                                    <?php 
                                                    if($m['Ingreso']['estado'] == 1)
                                                    {
                                                     $color = '#CAF2A2';   
                                                    }
                                                    else{
                                                     $color = '#FBD2D2';
                                                    }
                                                     ?>
                                                        <tr style="background: <?php echo $color;?>;">
                                                            <td style="background: <?php echo $color;?>;"><?php echo $m['Mascota']['kcb'] ?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $this->Html->link($m['Mascota']['nombre_completo'],array('action' => 'quitainscripcion',$m['EventosMascota']['id']),array('title' => 'Retirar','confirm' => 'Esta Seguro de retirar a '.$m['Mascota']['nombre_completo'].' del Evento ???'));?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $m['EventosMascota']['catalogo']; ?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $m['Mascota']['Raza']['nombre'] ?></td>
                                                            <td class="center" style="background: <?php echo $color;?>;">
                                                                <?php echo $m['Mascota']['Propietarioactual']['nombre'] ?>
                                                            </td>
                                                            
                                                        </tr>
                                            
                                            
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            
                                            
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            </div>
</div>
                                            