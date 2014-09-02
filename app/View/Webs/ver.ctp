<style>
.blanco{
    background: white;
}
</style>

<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <div class="row-fluid">
            <div class="span12">
            <div class="span6 center blanco">
            <h5>Nombre</h5>
            <?php echo $mascota['Mascota']['nombre_completo']?>
            </div>
            <div class="span6 center blanco">
            <h5>Raza</h5>
            <?php echo $mascota['Raza']['nombre'].' '.$mascota['Raza']['descripcion']?>
            </div>
            </div>
            </div>
            <br />
            <div class="row-fluid">
            <div class="span12">
            <div class="span4 center blanco">
            <h5>KCB</h5>
            <?php echo $mascota['Mascota']['kcb']?>
            </div>
            <div class="span4 center blanco">
            <h5>Numero de Tatuaje</h5>
            <?php echo $mascota['Mascota']['num_tatuaje']?>
            </div>
            <div class="span4 center blanco">
            <h5>Numero de Chip</h5>
            <?php echo $mascota['Mascota']['chip']?>
            </div>
            </div>
            </div>
            <br />
            <div class="row-fluid">
            <div class="span12">
            <div class="span4 center blanco">
            <h5>Fecha de Nacimiento</h5>
            <?php echo $mascota['Mascota']['fecha_nacimiento']?>
            </div>
            <div class="span4 center blanco">
            <h5>Color</h5>
            <?php echo $mascota['Mascota']['color']?>
            </div>
            <div class="span4 center blanco">
            <h5>Se&ntilde;as o Marca</h5>
            <?php echo $mascota['Mascota']['senas']?>
            </div>
            </div>
            </div>
            <br />
            <div class="row-fluid">
            <div class="span12">
            <div class="span4 center blanco">
            <h5>Variedad</h5>
            <?php echo $mascota['Mascota']['variedad']?>
            </div>
            <div class="span4 center blanco">
            <h5>Sexo</h5>
            <?php echo $mascota['Mascota']['sexo']?>
            </div>
            <div class="span4 center blanco">
            <h5>Propietario</h5>
            <?php echo $mascota['Propietarioactual']['nombre']?>
            </div>
            </div>
            </div>
            <br />
            <div class="row-fluid">
            <div class="span12">
            <div class="span6 center blanco">
            <h5>Afijo</h5>
            <?php echo $mascota['Criadero']['nombre']?>
            </div>
            <div class="span6 center blanco">
            <h5>Lugar</h5>
            <?php echo $mascota['Departamento']['nombre']?>
            </div>
            
            </div>
            </div>
            <br />
            <div class="row-fluid">
            <div class="span12">
            <div class="span4 center blanco">
            <h5>Consanguinidad</h5>
            <?php echo $mascota['Mascota']['consanguinidad']?>
            </div>
            <div class="span4 center blanco">
            <h5>Hermanos</h5>
            <?php echo $mascota['Mascota']['hermano']?>
            </div>
            <div class="span2 center blanco">
            <h5>Lechigada</h5>
            <?php echo $mascota['Mascota']['lechigada']?>
            </div>
            <div class="span2 center blanco">
            <h5>Fecha Emision</h5>
            <?php echo $mascota['Mascota']['fecha_emision']?>
            </div>
            </div>
            </div>
            <h3>Examenes</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">
            
                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Examen</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->
            
                <!-- Table body -->
                <tbody>
                <?php foreach($examenes as $ex):?>
                    <tr>
                        <td><?php echo $ex['Examenesmascota']['fecha_examen']?></td>
                        <td><?php echo $ex['Examene']['descripcion']?></td>
                        
                    </tr>
                <?php endforeach;?>
                
                </tbody>
                <!-- // Table body END -->

                </table>
            <h3>Transferencias</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">
            
                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Propietario</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->
            
                <!-- Table body -->
                <tbody>
                <?php foreach($transferencias as $pro):?>
                    <tr>
                        <td><?php echo $pro['Mascotaspropietario']['fecha_transfer']?></td>
                        <td><?php echo $pro['Propietario']['nombre']?></td>
                        
                    </tr>
                <?php endforeach;?>
                
                </tbody>
                <!-- // Table body END -->
            </table>
            <!-- // Table END -->
            <h3>Titulos</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">
            
                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Titulo</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->
            
                <!-- Table body -->
                <tbody>
                <?php foreach($titulos as $ti):?>
                    <tr>
                        <td><?php echo $ti['Mascotastitulo']['fecha_obtencion']?></td>
                        <td><?php echo $ti['Titulo']['nombre']?></td>
                        
                    </tr>
                <?php endforeach;?>
                
                </tbody>
                <!-- // Table body END -->
            
            </table>
            <!-- // Table END -->
<!-- // Table END -->
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <?php echo $this->Html->link('Atras',array('action' => 'listamascotas'),array('class' => 'btn btn-block btn-primary'));?>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>