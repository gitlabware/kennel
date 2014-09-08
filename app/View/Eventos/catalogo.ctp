<?php 
App::import('Model','GruposRaza');
$gruposraza = new GruposRaza();
App::import('Model','EventosMascota');
$eventosmascota = new EventosMascota();
?>
<div class="innerLR">
<h3>CATALOGO DE <?php echo $evento['Evento']['nombre'];?></h3>
<div class="widget widget-heading-simple widget-body-gray">
    <?php foreach($grupos as $gr):?>
    <div class="widget-body">
        <h3 class="center">GRUPO: <?php echo $gr['Grupo']['nombre'];?></h3>
        <?php 
        $razas = $gruposraza->find('all',array('conditions' => array('GruposRaza.grupo_id' => $gr['Grupo']['id'])));
        ?>
        <?php foreach ($razas as $ra):?>
        <div class="row-fluid">
            <div class="span12">
                <h4>RAZA: <?php echo $ra['Raza']['nombre'];?></h4>
                <?php $mascotas = $eventosmascota->find('all',array(
                'recursive' => 0,
                'conditions' => 
                array('EventosMascota.evento_id' => $idEvento,'EventosMascota.raza_id' => $ra['Raza']['id'],'Ingreso.estado' => 1)
                ,'fields' => array('Mascota.kcb','Mascota.codigo','Mascota.nombre_completo','EventosMascota.catalogo','Propietario.nombre')));
                        ?>
                <table class="table table-bordered table-white">
                    <thead>
                        <tr>
                            <th>KCB/CODIGO</th>
                            <th>Ejemplar</th>
                            <th>Nro Cat.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mascotas as $ma):?>
                        <tr>
                            <td><?php 
                            if(!empty($ma['Mascota']['kcb']) && $ma['Mascota']['kcb'] != 'nulo')
                            {
                                echo $ma['Mascota']['kcb'];
                            }
                            elseif (!empty ($ma['Mascota']['codigo'])) {
                            echo $ma['Mascota']['codigo'];
                        }
                            ?></td>
                            <td><?php echo $ma['Mascota']['nombre_completo'];?></td>
                            <td><?php echo $ma['EventosMascota']['catalogo'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php endforeach;?>
</div>
</div>
