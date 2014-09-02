<!-- Table -->
<table class="table table-bordered table-white">

    <!-- Table heading -->
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Accion</th>
        </tr>
    </thead>
    <!-- // Table heading END -->

    <!-- Table body -->
    <tbody>
    <?php foreach($titulos as $ti):?>
        <tr>
            <td><?php echo $ti['Mascotastitulo']['fecha_obtencion']?></td>
            <td><?php echo $ti['Titulo']['nombre']?></td>
            <td><a href="javascript:" class="label label-primary" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'titulo',$idMascota,$ti['Mascotastitulo']['id']));?>');">Editar</a> 
            <a href="javascript:" class="label label-important" onclick="if(confirm('Esta seguro de aliminar??')){$('#imgcargandoopciones').toggle();$('#examenes').toggle();$('#examenes').load('<?php echo $this->Html->url(array('action' => 'tituloelimina',$idMascota,$ti['Mascotastitulo']['id']));?>');$('#imgcargandoopciones').toggle(100);$('#examenes').toggle();}else{}">Eliminar</a>
            </td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td></td>
        <td><a href="javascript:" class="label label-success" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'titulo',$idMascota));?>');">Adicionar</a></td>
    </tr>
    </tbody>
    <!-- // Table body END -->

</table>
<!-- // Table END -->