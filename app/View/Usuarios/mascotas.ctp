
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<div class="innerLR">
<h3>Mis Ejemplares</h3>
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <div id="listado2">
        <table class="table table-bordered table-white">
            <thead>
                <tr>
                    <th style="width: 53px;">Foto</th>
                    <th>Nro KCB</th>
                    <th align="center">Ejemplar</th>
                    <th>Nro tatoo</th>
                    <th class="center">Raza</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                        <?php foreach($mascotas as $m):?>
                        <?php $color = '';?>
                        <?php if($m['Mascota']['solicitud'] == 2):?>
                        
                        <?php $color = '#B8FF9D';?>
                        <?php endif;?>
                        <tr  style="background: <?php echo $color?>;">
                            <?php if(empty($m['Mascota']['imagen'])):?>
                            <td><a href="#myModal" data-toggle="modal" class="media-object pull-left thumb" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxfoto',$m['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"\><img data-src="holder.js/51x51" alt="51x51" style="width: 51px; height: 51px;" /></a></td>
                            <?php else:?>
                            <td><a href="#myModal" data-toggle="modal" class="media-object pull-left thumb" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxfoto',$m['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"\><img src="<?php echo $this->Html->webroot('img/fotos/'.$m['Mascota']['imagen']);?>"  style="width: 51px; height: 51px;" /></a></td>
                            <?php endif;?>
                            <td class="center"><?php echo $m['Mascota']['kcb']?></td>
                            <td id="fila<?php echo $m['Mascota']['id']?>">
                            <div id="cfila<?php echo $m['Mascota']['id']?>">
                            <?php echo $m['Mascota']['nombre_completo']; ?>
                            </div>
                             </td>
                            <td><?php echo $m['Mascota']['num_tatuaje']?></td>
                            <td class="center">
                                <?php echo $m['Raza']['nombre']?>
                            </td>
                            <td class="hidden-print">
                            <?php if($m['Mascota']['solicitud'] != 2):?>
                            <?php echo $this->Html->link('Editar',array('action' => 'ejemplar',$m['Mascota']['id']),array('class' => 'label label-info'));?>
                            <?php echo $this->Html->link('Generaciones',array('controller' => 'Mascotas','action' => 'generaciones',$m['Mascota']['id']),array('class' => 'label label-inverse'));?>
                            <!--<a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php //echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmascota',$m['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>-->
                            <?php endif;?>
                            
                            <a href="<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ver', $m['Mascota']['id'])); ?>" class="label label-warning">Ver</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
            </tbody>  
            </table>
        </div>
        </div>
    </div>
</div>
