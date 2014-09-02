<!-- Table -->
<table class="table table-bordered table-white">

    <!-- Table heading -->
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Examen</th>
            <th>Accion</th>
        </tr>
    </thead>
    <!-- // Table heading END -->

    <!-- Table body -->
    <tbody>
    <?php foreach($examenes as $ex):?>
        <tr>
            <td><?php echo $ex['Examenesmascota']['fecha_examen']?></td>
            <td><?php echo $ex['Examene']['descripcion']?></td>
            <td><a href="javascript:" class="label label-primary" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'examen',$idMascota,$ex['Examenesmascota']['id']));?>');">Editar</a> 
            <a href="javascript:" class="label label-important" onclick="if(confirm('Esta seguro de aliminar??')){$('#imgcargandoopciones').toggle();$('#examenes').toggle();$('#examenes').load('<?php echo $this->Html->url(array('action' => 'examenelimina',$idMascota,$ex['Examenesmascota']['id']));?>');$('#imgcargandoopciones').toggle(100);$('#examenes').toggle();}else{}">Eliminar</a>
            </td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td></td>
        <td><a href="javascript:" class="label label-success" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'examen',$idMascota));?>');">Adicionar</a></td>
    </tr>
    </tbody>
    <!-- // Table body END -->

</table>
<!-- // Table END -->