<?php
App::Import('Model', 'EventosMascotasPuntaje');
$evenmaspun = new EventosMascotasPuntaje();
?>
<div class="innerLR">
<h3 class="center">RANKING OFICIAL CACHORROS ESPECIALES DE <?php if(!empty($ano)){echo $ano;}else{echo strtoupper ($evento['Evento']['nombre']); }?></h3>
<h3 class="center">KENNEL CLUB BOLIVIANO</h3>
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <?php if(!empty($ano)):?>
        <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'cargareportes',$ano));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Reportes</a>
        <?php else:?>
        <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'reporte',$idEvento));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Reportes</a>
        <?php endif;?>
        </div>
        </div>
        <table class="table table-bordered table-white">
            <thead>
            <tr>
            <th>Cat.</th>
            <th>Ejemplar</th>
            <th>Propietario</th>
            <th>Pts.</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach($razas as $ra):?>
            <?php 
            $ranking = array();
            if(!empty($ano))
            {
                $ranking = $evenmaspun->find('all',array('recursive' => 2,'order' => 'EventosMascotasPuntaje.puntos ASC','conditions' => array('EventosMascotasPuntaje.raza_id' => $ra['Raza']['id'],'Year(Evento.fecha_inicio)' => $ano,'EventosMascotasPuntaje.categoriaspista_id' => 1)));
            }
            else{
                $ranking = $evenmaspun->find('all',array('recursive' => 2,'order' => 'EventosMascotasPuntaje.puntos ASC','conditions' => array('EventosMascotasPuntaje.raza_id' => $ra['Raza']['id'],'EventosMascotasPuntaje.evento_id' => $idEvento,'EventosMascotasPuntaje.categoriaspista_id' => 1)));
            }
            
            ?>
            <?php if(!empty($ranking)):?>
            <tr>
            <td class="center" colspan="4" style="background: #95C4DF; color: white;"><?php echo $ra['Raza']['nombre']?></td>
            </tr>
            <?php $i = 0;?>
            
            <?php foreach($ranking as $ran):?>
            <?php $i++;?>
            <tr>
            <td><?php echo $ran['EventosMascota']['catalogo']?></td>
            <td><?php echo $ran['Mascota']['nombre_completo'];?></td>
            <td><?php echo $ran['Mascota']['Propietarioactual']['nombre'];?></td>
            <td><?php echo $ran['EventosMascotasPuntaje']['puntos']?></td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
            <?php endforeach;?>
            
            </tbody>
        </table>
        </div>
    </div>
</div>