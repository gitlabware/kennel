<?php 
App::import('Model','GruposRaza');
$gruposraza = new GruposRaza();
App::import('Model','Temporalmascota');
$temporalmascota = new Temporalmascota();
?>
<style>
    .label-negra{
        font-weight: bold;
        font-family: cursive;
        color: #151515;
    }
    .label-azul{
        font-family: cursive;
        font-weight: bold;
        color: #292c2e;
    }
</style>
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
                <?php $mascotas = $temporalmascota->find('all',array(
                'recursive' => 0,
                'conditions' => 
                array('Temporalmascota.evento_id' => $idEvento,'Temporalmascota.raza_id' => $ra['Raza']['id'])
                ));
                        ?>
                <?php foreach ($mascotas as $ma):?>
                <table class="table table-bordered table-white">
                    
                    <tbody>
                        
                        <tr>
                            <td><label class="label-negra">KCB</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['kcb']?></label></td>
                            <td><label class="label-negra">Nombre</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['nombre']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Color</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['color']?></label></td>
                            <td><label class="label-negra">Fecha de Nacimiento</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['fecha_nacimiento']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Sexo</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['sexo']?></label></td>
                            <td><label class="label-negra">Codigo</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['codigo']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Numero Tatuaje</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['num_tatuaje']?></label></td>
                            <td><label class="label-negra">Chip</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['chip']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Color</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['color']?></label></td>
                            <td><label class="label-negra">Fecha de Nacimiento</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['fecha_nacimiento']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Criador</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['criador']?></label></td>
                            <td><label class="label-negra">Propietario</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['propietario']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Ciudad - Pais</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['ciudad_pais']?></label></td>
                            <td><label class="label-negra">Telefono</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['telefono']?></label></td>
                        </tr>
                        <tr>
                            <td><label class="label-negra">Email</label></td><td><label class="label-azul"><?php echo $ma['Temporalmascota']['email']?></label></td>
                            <td><label class="label-negra">-----------</label></td><td><label class="label-azul">-----------</label></td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php endforeach;?>
</div>
</div>
