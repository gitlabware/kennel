<div class="innerLR">
<h3 class="center">RANKING OFICIAL CACHORROS ABSOLUTOS DE <?php if(!empty($ano)){echo $ano;}else{echo strtoupper ($evento['Evento']['nombre']); }?><?php ?></h3>
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
            <th>Num.</th>
            <th>Ejemplar</th>
            <th>Propietario</th>
            <th>Pts.</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php $i = 0;?>
            
            <?php foreach($ranking as $ran):?>
            <?php $i++;?>
            <tr>
            <td><?php if($i <= 10){echo $i;}?></td>
            <td><?php echo $ran['Mascota']['nombre_completo'];?></td>
            <td><?php echo $ran['Mascota']['Propietarioactual']['nombre'];?></td>
            <td><?php echo $ran['EventosMascotasPuntaje']['puntos']?></td>
            </tr>
            <?php endforeach;?>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>